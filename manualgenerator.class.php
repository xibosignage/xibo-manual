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

    public function __construct($productName, $productHome, $productSupportUrl, $productFaqUrl)
    {
        // This should be updated with each release of the manual
        $this->productVersion = '1.7.4';

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

        // Copy the bootstrap, jquery folders and the img folder
        if (!is_dir($this->outputPath . 'libraries'))
            mkdir($this->outputPath . 'libraries');

        $this->xcopy($this->sourcePath . 'libraries/bootstrap', $this->outputPath . 'libraries/bootstrap');
        $this->xcopy($this->sourcePath . 'libraries/jquery', $this->outputPath . 'libraries/jquery');
        $this->xcopy($this->sourcePath . 'template/img', $this->outputPath . 'img');
        $this->xcopy($this->sourcePath . 'template/manual.css', $this->outputPath . 'manual.css');
        $this->xcopy($this->sourcePath . 'template/index.html', $this->outputPath . 'index.html');
        $this->xcopy($this->sourcePath . 'template/api-doc.html', $this->outputPath . 'api-doc.html');

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

                // Make sure a full suite of images is present.
                $this->xcopy($this->sourcePath . 'source/en/img', $this->outputPath . $langDir . '/img');
                
                // And layer in any language specific replacements
                if (is_dir($this->sourcePath . 'source/' . $langDir . '/img'))
                    $this->xcopy($this->sourcePath . 'source/' . $langDir . '/img', $this->outputPath . $langDir . '/img');
                
                if ($langDir != 'en')
                    $languages[] = $langDir;
            }
        }

        // Build a langs string
        $langsString = '<a href="../en/index.html">en</a>';
        foreach ($languages as $lang) {
            $langsString .= ' | <a href="../' . $lang . '/index.html">' . $lang . '</a>';
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

    private function processFile($langs, $folder, $lang, $file)
    {
        echo '.';
        flush();

        // Get the page content
        $pageContent = Parsedown::instance()->text($this->processReplacements($lang, $this->file_get_contents_or_default($lang, $file . '.md')));
        $toc = strtok($pageContent, "\n");
        $toc = str_replace('-->', '', str_replace('<!--toc=', '', $toc));

        // Header
        $string  = $this->processReplacements($lang, file_get_contents($this->sourcePath . 'template/header.html'));
        $string .= $this->processReplacements($lang, file_get_contents($this->sourcePath . 'template/footer.html'));

        $string = str_replace('[[TOCNAME]]', $toc, $string);
        $string = str_replace('[[PAGE]]', $pageContent, $string);
        $string = str_replace('[[NAVBAR]]', $this->file_get_contents_or_default($lang, '/toc/nav_bar.html'), $string);
        
        // Handle the TOC
        $string = str_replace('[[TOC]]', Parsedown::instance()->text($this->file_get_contents_or_default($lang, '/toc/' . $toc . '.md')), $string);

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

    private function processReplacements($lang, $string)
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
        }
        else {
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
