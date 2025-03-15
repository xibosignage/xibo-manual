<?php
/*
 * Xibo - Digital Signage - http://www.xibo.org.uk
 * Copyright (C) 2006-2018 Xibo Signage Ltd
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

/*
 * Portion copyright (C) 2025 Open source Digital Signage Initiative.
 * Medified by Mark Miura (miura@open-signage.org)
 */

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Normalizer\SlugNormalizer;
use League\CommonMark\Parser\MarkdownParser;
use League\CommonMark\Renderer\HtmlRenderer;

class ManualGenerator
{
    private static $environment;

    private $whiteLabel;
    private $productName;
    private $productVersion;
    private $productHome;
    private $productSupportUrl;
    private $productFaqUrl;

    private $sourcePath;
    private $outputPath;

    private $template;
    private $templateName;

    /**
     * Language specific image replacements
     * @var array
     */
    private $languageImages = [];

    public function __construct($productName, $productHome, $productSupportUrl, $productFaqUrl, $template = 'default')
    {
        // This should be updated with each release of the manual
        $this->productVersion = '4';

        $this->productName = $productName;
        $this->productHome = $productHome;
        $this->productSupportUrl = $productSupportUrl;
        $this->productFaqUrl = $productFaqUrl;

        $this->whiteLabel = ($this->productName != 'Xibo');

        $this->templateName = $template;
    }

    /**
     * Return the template aware path
     * @param $file
     * @return string
     */
    private function path($file)
    {
        if ($this->templateName == 'default')
            return $this->sourcePath . 'template/default/' . $file;

        if (file_exists($this->sourcePath . 'template/custom/' . $this->templateName . '/' . $file))
            return $this->sourcePath . 'template/custom/' . $this->templateName . '/' . $file;
        else
            return $this->sourcePath . 'template/default/' . $file;
    }

    /**
     * Build
     * @param $sourcePath
     * @param $outputPath
     */
    public function build($sourcePath, $outputPath)
    {
        $this->outputPath = $outputPath;
        $this->sourcePath = $sourcePath;

        // Clean the output folder
        if (is_dir($this->outputPath)) {
            $this->delete($this->outputPath);
            sleep(3);
        }
        mkdir($this->outputPath);

        // Load the template
        $this->loadTemplate();

        foreach (json_decode(file_get_contents($this->path('files.json'))) as $file) {

            // Are we a file or a folder?
            if (stripos($file, '.') === false) {
                // Folder
                mkdir($this->outputPath . $file);
            }

            $this->xcopy($this->path($file), $this->outputPath . $file);
        }

        $languages = array();

        // Get a list of folders
        foreach (array_diff(scandir($this->sourcePath . 'source'), array('..', '.')) as $langDir) {

            if (is_dir($this->sourcePath . 'source/' . $langDir)) {
                echo 'Found ' . $langDir . PHP_EOL;

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
        $headerLocation = $this->path('header.html');
        $footerLocation = $this->path('footer.html');

        $this->template  = $this->processReplacements(file_get_contents($headerLocation));
        $this->template .= $this->processReplacements(file_get_contents($footerLocation));
    }

    /**
     * process a single file
     * @param string $langs the language string
     * @param string $folder the folder
     * @param string $lang the current language
     * @param string $file the file
     * @throws \DOMException
     */
    private function processFile($langs, $folder, $lang, $file)
    {
        echo '.';
        flush();

        // Get the page content
        $pageContent = $this->processReplacements($this->file_get_contents_or_default($lang, $file . '.md'));

        // Do we have front-matter or the old TOC comment.
        $toc = strtok($pageContent, "\n");
        if (stripos($toc, '<!--toc=') !== false) {
            // Find out what TOC this file should have (read the first line)
            $toc = str_replace('-->', '', str_replace('<!--toc=', '', $toc));
            $maxHeadingLevel = '';
            $minHeadingLevel = '';
        } else {
            // Front matter
            $frontMatter = new Webuni\FrontMatter\FrontMatter();
            $meta = $frontMatter->parse($pageContent);
            $data = $meta->getData();
            $toc = $data['toc'] ?? '';
            $maxHeadingLevel = $data['maxHeadingLevel'] ?? '';
            $minHeadingLevel = $data['minHeadingLevel'] ?? '';
        }

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
        $pageContent = self::getHtml($pageContent);

        // Look for headers in the page content and give them ID's based on their actual content.
        $pageContent = preg_replace_callback('#(<h1>)(.*)(</h1>)#i', function ($m) {
            $id = strtolower(str_replace(' ', '_', $m[2]));
            return '<h1 id="' . $id . '">' . $m[2] . ' <a href="#' . $id . '" class="header-link"><span class="glyphicon glyphicon-link"></span></a></h1>';
        }, $pageContent);

        $pageContent = preg_replace_callback('#(<h2>)(.*)(</h2>)#i', function ($m) {
            $id = strtolower(str_replace(' ', '_',$m[2]));
            return '<h2 id="' . $id . '">' . $m[2] . ' <a href="#' . $id . '" class="header-link"><span class="glyphicon glyphicon-link"></span></a></h2>';
        }, $pageContent);

        $pageContent = preg_replace_callback('#(<h3>)(.*)(</h3>)#i', function ($m) {
            $id = strtolower(str_replace(' ', '_',$m[2]));
            return '<h3 id="' . $id . '">' . $m[2] . ' <a href="#' . $id . '" class="header-link"><span class="glyphicon glyphicon-link"></span></a></h3>';
        }, $pageContent);

        // Header and Footer
        $string = $this->template;

        $string = str_replace('[[TOCNAME]]', $toc, $string);
        $string = str_replace('[[PAGE]]', $pageContent, $string);

        // Table of Header index
        //   we want to create contents index at the right side bar
        $tocString = '';
//        $tocString = $this->generateTOC($string, $minHeadingLevel, $maxHeadingLevel);
$minHeadingLevel = 1;
        $tocString = $this->generateTOC($string, $minHeadingLevel, $maxHeadingLevel);
        $string = str_replace('[[TOC]]', $tocString, $string);


        // Navigation
        //  we want to put the appropriate TOC at the right place inside the navbar
        $navString = '';
        $navigation = json_decode($this->file_get_contents_or_default($lang, 'toc/nav_bar.json'), true);

        // for each item in the menu, we want to render a navbar link
        foreach ($navigation as $nav) {
            // Does this nav link hold the TOC for the current page?
            $tocString = '';
            $navToc = $nav['containsToc'][0];
            if (in_array($toc, $nav['containsToc'])) {
                $navToc = $toc;
                $tocString = self::getHtml(
                    $this->processReplacements($this->file_get_contents_or_default($lang, 'toc/' . $toc . '.md'))
                );

                // highlight the sub link in this toc
                $document = new DOMDocument();
                $document->loadHTML('<?xml encoding="UTF-8">' . $tocString);
                // $document->loadHTML($tocString);

                foreach ($document->getElementsByTagName('a') as $a) {
                    /** @var DOMElement $a */
                    if ($a->getAttribute('href') === $file . '.html') {
                        // Get the parent and add a class
                        $a->parentNode->setAttribute('class', 'active');
                        $arrow = $document->createElement('span');
                        $arrow->setAttribute('class', 'glyphicon glyphicon-arrow-left you-are-here-arrow');
                        $a->appendChild($arrow);
                    }
                }

                $tocString = $document->saveHTML($document->documentElement);
                // $tocString = $document->saveHTML();
            }

            $navString .= '<li><a href="' . $nav['href'] . '" data-toc-name="' . $navToc . '">' . $nav['title'] . '</a></li>';
            $navString .= $tocString;
        }

        $string = str_replace('[[NAVBAR]]', $navString, $string);

        // Replace the languages
        $string = str_replace('[[LANGS]]', $langs, $string);

        file_put_contents($folder . $lang . DIRECTORY_SEPARATOR . $file . '.html', $string);
    }

    private function generateTOC($html, $minHeadingLevel = 1, $maxHeadingLevel = 6) {
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $headings = [];
    for ($level = $minHeadingLevel; $level <= $maxHeadingLevel; $level++) {
        $tag = 'h' . $level;
        $elements = $dom->getElementsByTagName($tag);
        foreach ($elements as $element) {
            $id = $element->getAttribute('id');
            $text = $element->textContent;
            if ($id && $text) {
                $headings[] = ['id' => $id, 'text' => $text, 'level' => $level];
            }
        }
    }

    if (empty($headings)) {
        return '<p>指定されたレベル範囲に見出しがありません。</p>';
    }

    $toc = '';
    $previousLevel = $minHeadingLevel;

    foreach ($headings as $heading) {
        $level = $heading['level'];
        $indent = str_repeat('&nbsp;', $level - $minHeadingLevel); // インデントを生成

        $toc .= '<p>' . $indent . '<a href="#' . $heading['id'] . '">' . htmlspecialchars($heading['text']) . '</a></p>';
        $previousLevel = $level;
    }

    return $toc;
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
            $string = preg_replace('/({(nonwhite)\b[^}]*}).*?({\/\2})/s', '', $string);
            $string = str_replace('{white}', '', $string);
            $string = str_replace('{/white}', '', $string);
        }
        else {
            $string = preg_replace('/({(white)\b[^}]*}).*?({\/\2})/s', '', $string);
            $string = str_replace('{nonwhite}', '', $string);
            $string = str_replace('{/nonwhite}', '', $string);
        }

        // Do the SVG's exist (not all templates will have these)
        $isSvg = (is_dir($this->outputPath . 'img/svg'));

        // Replace highlight blocks with div's and styles
        $string = preg_replace_callback('/({(tip)\b[^}]*}).*?({\/\2})/s', function($matches) use ($isSvg) {
            $match = $matches[0];
            $match = str_replace('{tip}', '', $match);
            $match = str_replace('{/tip}', '', $match);
            return '<blockquote class="tip">' . (($isSvg) ? '<img class="blockquote-image" src="../img/svg/Home/icon_home_engage_lightblue.svg" />' : '') . self::getHtml($match) . '</blockquote>';
        }, $string);

        $string = preg_replace_callback('/({(cloud)\b[^}]*}).*?({\/\2})/s', function($matches) use ($isSvg) {
            $match = $matches[0];
            $match = str_replace('{cloud}', '', $match);
            $match = str_replace('{/cloud}', '', $match);
            return '<blockquote class="cloud">' . (($isSvg) ? '<img class="blockquote-image" src="../img/svg/Home/icon_home_cloud_blue.svg" />' : '') . self::getHtml($match) . '</blockquote>';
        }, $string);

        $string = preg_replace_callback('/({(noncloud)\b[^}]*}).*?({\/\2})/s', function($matches) use ($isSvg) {
            $match = $matches[0];
            $match = str_replace('{noncloud}', '', $match);
            $match = str_replace('{/noncloud}', '', $match);
            return '<blockquote class="noncloud">' . (($isSvg) ? '<img class="blockquote-image" src="../img/svg/Home/icon_home_cms_orange.svg" />' : '') . self::getHtml($match) . '</blockquote>';
        }, $string);

        $string = preg_replace_callback('/({(version)\b[^}]*}).*?({\/\2})/s', function($matches) use ($isSvg) {
            $match = $matches[0];
            $match = str_replace('{version}', '', $match);
            $match = str_replace('{/version}', '', $match);
            return '<blockquote class="version">' . (($isSvg) ? '<img class="blockquote-image" src="../img/svg/Home/icon_home_version.svg" />' : '') . self::getHtml($match) . '</blockquote>';
        }, $string);

        // Strip out other not supported tags.
        $string = preg_replace('/({(feat)\b[^}]*}).*?({\/\2})/s', '', $string);
        $string = preg_replace('/({(feat_cat)\b[^}]*}).*?({\/\2})/s', '', $string);
        $string = preg_replace('/({(product)\b[^}]*}).*?({\/\2})/s', '', $string);
//        $string = preg_replace('/({(version)\b[^}]*}).*?({\/\2})/s', '', $string);
        $string = str_replace(['{includeRevisions}', '{/includeRevisions}'], '', $string);

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

    public static function getHtml($markdown): string
    {
        $document = self::getDocument($markdown);
        return (new HtmlRenderer(self::$environment))->renderDocument($document);
    }

    public static function getDocument($markdown): Document
    {
        self::$environment = new Environment([
            'slug_normalizer' => [
                'instance' => new SlugNormalizer(),
            ],
            'disallowed_raw_html' => [
                'disallowed_tags' => ['title', 'textarea', 'style', 'xmp', 'noembed', 'noframes', 'script', 'plaintext'],
            ],
        ]);
        self::$environment->addExtension(new CommonMarkCoreExtension());
        self::$environment->addExtension(new DisallowedRawHtmlExtension());
        self::$environment->addExtension(new GithubFlavoredMarkdownExtension());
        self::$environment->addExtension(new AttributesExtension());
        self::$environment->addExtension(new SmartPunctExtension());
        self::$environment->addExtension(new FrontMatterExtension());

        return (new MarkdownParser(self::$environment))->parse($markdown);
    }
}
