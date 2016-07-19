<?php
/*
 * Xibo - Digital Signage - http://www.xibo.org.uk
 * Copyright (C) 2006-2015 Spring Signage Ltd
 *
 * This file is part of Xibo.
 *
 * Xibo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Xibo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Xibo.  If not, see <http://www.gnu.org/licenses/>.
 */
class ManualGenerator
{
    private $whiteLabel;
    private $productName;
    private $productVersion;
    private $productHome;
    private $productSupportUrl;
    private $productFaqUrl;

    private $sourcePath;
    private $outputPath;

    private $template;
    public $overrideHeader;
    public $overrideFooter;

    /**
     * Language specific image replacements
     * @var array
     */
    private $languageImages = [];

    public function __construct($productName, $productHome, $productSupportUrl, $productFaqUrl)
    {
        // This should be updated with each release of the manual
        $this->productVersion = '1.8.0-beta';

        $this->productName = $productName;
        $this->productHome = $productHome;
        $this->productSupportUrl = $productSupportUrl;
        $this->productFaqUrl = $productFaqUrl;

        $this->whiteLabel = ($this->productName != 'Xibo');
    }

    public function build($sourcePath, $outputPath)
    {
        $this->outputPath = $outputPath;
        $this->sourcePath = $sourcePath;

        // Load the template
        $this->loadTemplate();

        // Copy the bootstrap, jquery folders and the img folder
        if (!is_dir($this->outputPath . 'libraries'))
            mkdir($this->outputPath . 'libraries');

        $this->xcopy($this->sourcePath . 'libraries/bootstrap', $this->outputPath . 'libraries/bootstrap');
        $this->xcopy($this->sourcePath . 'libraries/jquery', $this->outputPath . 'libraries/jquery');
        $this->xcopy($this->sourcePath . 'template/img', $this->outputPath . 'img');
        $this->xcopy($this->sourcePath . 'template/manual.css', $this->outputPath . 'manual.css');
        $this->xcopy($this->sourcePath . 'template/index.html', $this->outputPath . 'index.html');

        // Copy the en/ language images into the en/language sub folder.
        $this->xcopy($this->sourcePath . 'source/en/img', $this->outputPath . 'en/img');

        $languages = array();

        // Get a list of folders
        foreach (array_diff(scandir($this->sourcePath . 'source'), array('..', '.')) as $langDir) {

            if (is_dir($this->sourcePath . 'source/' . $langDir)) {
                echo 'Found ' . $langDir . PHP_EOL;

                // Make sure our output folder is empty
                if (is_dir($this->outputPath . $langDir)) {
                    $this->delete($this->outputPath . $langDir);
                    sleep(3);
                }

                mkdir($this->outputPath . $langDir);

                // Copy any language specific images into the img folder.
                if (is_dir($this->sourcePath . 'source/' . $langDir . '/img')) {
                    $this->xcopy($this->sourcePath . 'source/' . $langDir . '/img', $this->outputPath . $langDir . '/img');
                }

                if ($langDir != 'en')
                    $languages[] = $langDir;
            }
        }

        // Process each detected language
        $langsString = '<a href="../en/index.html">en</a>';
        foreach ($languages as $lang) {
            // Build a langs string
            $langsString .= ' | <a href="../' . $lang . '/index.html">' . $lang . '</a>';

            // Build an array of language specific images
            $this->languageImages[$lang] = array_map(function($element) {
                return basename($element);
            }, glob($this->sourcePath . 'source/' . $lang . '/img/*.*'));
        }

        // Scan files in the EN folder:
        foreach (array_diff(scandir($this->sourcePath . 'source/en'), array('..', '.')) as $file) {
            if (stripos($file, '.md')) {
                // Process each file in turn
                $this->processFile($langsString, $this->outputPath, 'en', str_replace('.md', '', $file));

                // Process for the other languages.
                foreach ($languages as $lang) {
                    $this->processFile($langsString, $this->outputPath, $lang, str_replace('.md', '', $file));
                }
            }
        }

        echo PHP_EOL;
    }

    private function loadTemplate()
    {
        $headerLocation = ($this->overrideHeader == null) ? $this->sourcePath . 'template/header.html' : $this->overrideHeader;
        $footerLocation = ($this->overrideFooter == null) ? $this->sourcePath . 'template/footer.html' : $this->overrideFooter;

        $this->template  = $this->processReplacements(file_get_contents($headerLocation));
        $this->template .= $this->processReplacements(file_get_contents($footerLocation));
    }

    /**
     * process a single file
     * @param string $langs the language string
     * @param string $folder the folder
     * @param string $lang the current language
     * @param string $file the file
     */
    private function processFile($langs, $folder, $lang, $file)
    {
        echo '.';
        flush();

        // Get the page content
        $pageContent = $this->processReplacements($this->file_get_contents_or_default($lang, $file . '.md'));

        // Replace any image URL's which do not exist in the img folder for this language
        // unless we are "en" in which case we are the source of all images so it doesn't matter
        if ($lang != 'en') {
            $langImg = $this->languageImages[$lang];
            $pageContent = preg_replace_callback('/(!\[.*?\]\()(.+?)(\))/s', function ($matches) use ($langImg) {
                if (!in_array(str_replace('img/', '', $matches[2]), $langImg)) {
                    return str_replace('img/', '../en/img/', $matches[0]);
                } else {
                    return $matches[0];
                }
            }, $pageContent);
        }

        // Run through parse down
        $pageContent = Parsedown::instance()->text($pageContent);

        // Find out what TOC this file should have (read the first line)
        $toc = strtok($pageContent, "\n");
        $toc = str_replace('-->', '', str_replace('<!--toc=', '', $toc));

        // Header and Footer
        $string = $this->template;

        $string = str_replace('[[TOCNAME]]', $toc, $string);
        $string = str_replace('[[PAGE]]', $pageContent, $string);
        $string = str_replace('[[NAVBAR]]', $this->file_get_contents_or_default($lang, 'toc/nav_bar.html'), $string);

        // Handle the TOC
        $string = str_replace('[[TOC]]', Parsedown::instance()->text(
            $this->processReplacements($this->file_get_contents_or_default($lang, 'toc/' . $toc . '.md'))
        ), $string);

        // Replace the languages
        $string = str_replace('[[LANGS]]', $langs, $string);

        file_put_contents($folder . $lang . DIRECTORY_SEPARATOR . $file . '.html', $string);
    }

    private function file_get_contents_or_default($lang, $file)
    {
        if (file_exists($this->sourcePath . 'source' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . $file))
            return file_get_contents($this->sourcePath . 'source' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . $file);
        else
            return file_get_contents($this->sourcePath . 'source' . DIRECTORY_SEPARATOR . 'en' . DIRECTORY_SEPARATOR . $file);
    }

    private function processReplacements($string)
    {
        // Replace the nav bar
        $string = str_replace('[[PRODUCTNAME]]', $this->productName, $string);
        $string = str_replace('[[PRODUCTVERSION]]', $this->productVersion, $string);
        $string = str_replace('[[PRODUCTHOME]]', $this->productHome, $string);
        $string = str_replace('[[PRODUCTSUPPORTURL]]', $this->productSupportUrl, $string);
        $string = str_replace('[[PRODUCTFAQURL]]', $this->productFaqUrl, $string);

        // Replace any chunks of manual that we don't want appearing in non white labels
        if ($this->whiteLabel) {
            $string = preg_replace('/<(nonwhite)(?:(?!<\/\1).)*?<\/\1>/s', '', $string);
            $string = str_replace('<white>', '', $string);
            $string = str_replace('</white>', '', $string);
        }
        else {
            $string = preg_replace('/<(white)(?:(?!<\/\1).)*?<\/\1>/s', '', $string);
            $string = str_replace('<nonwhite>', '', $string);
            $string = str_replace('</nonwhite>', '', $string);
        }

        return $string;
    }

    /**
     * Copy a file, or recursively copy a folder and its contents
     * @param       string   $source    Source path
     * @param       string   $dest      Destination path
     * @param       int   $permissions New folder creation permissions
     * @return      bool     Returns true on success, false on failure
     */
    function xcopy($source, $dest, $permissions = 0755)
    {
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest, $permissions);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            $this->xcopy("$source/$entry", "$dest/$entry");
        }

        // Clean up
        $dir->close();
        return true;
    }

    function delete($path)
    {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                $this->delete(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        }
        else if (is_file($path) === true) {
            return unlink($path);
        }

        return false;
    }
}
?>
