<?php
include_once('libraries/parsedown/parsedown.php');
include_once('template/template.php');

$OUTPUT_ROOT = 'output/';

// Generates a complete manual.

// Copy the bootstrap, jquery folders and the img folder
if (!is_dir($OUTPUT_ROOT . 'libraries'))
    mkdir($OUTPUT_ROOT . 'libraries');

xcopy('libraries/bootstrap', $OUTPUT_ROOT . 'libraries/bootstrap');
xcopy('libraries/jquery', $OUTPUT_ROOT . 'libraries/jquery');
xcopy('template/img', $OUTPUT_ROOT . 'img');
xcopy('template/manual.css', $OUTPUT_ROOT . 'manual.css');

$languages = array();

// Get a list of folders
foreach (array_diff(scandir('source'), array('..', '.')) as $langDir) {
    
    if (is_dir('source/' . $langDir)) {
        echo 'Found ' . $langDir . PHP_EOL;

        // Make sure our output folder is empty
        if (is_dir($OUTPUT_ROOT . $langDir)) {
            delete($OUTPUT_ROOT . $langDir);
            sleep(3);
        }
        
        mkdir($OUTPUT_ROOT . $langDir);

        // Make sure a full suite of images is present.
        xcopy('source/en/img', $OUTPUT_ROOT . $langDir . '/img');
        
        // And layer in any language specific replacements
        if (is_dir('source/' . $langDir . '/img'))
            xcopy('source/' . $langDir . '/img', $OUTPUT_ROOT . $langDir . '/img');
        
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
foreach (array_diff(scandir('source/en'), array('..', '.')) as $file) {
    if (stripos($file, '.md')) {
        // Process each file in turn
        processFile($langsString, $OUTPUT_ROOT, 'en', str_replace('.md', '', $file));

        // Process for the other languages.
        foreach ($languages as $lang) {
            processFile($langsString, $OUTPUT_ROOT, $lang, str_replace('.md', '', $file));
        }
    }
}

echo PHP_EOL;

function processFile($langs, $folder, $lang, $file) {
    
    echo '.';
    flush();

    // Get the page content
    $pageContent = Parsedown::instance()->text(processReplacements($lang, file_get_contents_or_default($lang, $file . '.md')));
    $toc = strtok($pageContent, "\n");
    $toc = str_replace('-->', '', str_replace('<!--toc=', '', $toc));

    // Header
    $string  = processReplacements($lang, file_get_contents('template/header.html'));
    $string .= processReplacements($lang, file_get_contents('template/footer.html'));

    $string = str_replace('[[TOCNAME]]', $toc, $string);
    $string = str_replace('[[PAGE]]', $pageContent, $string);
    $string = str_replace('[[NAVBAR]]', file_get_contents_or_default($lang, '/toc/nav_bar.html'), $string);
    
    // Handle the TOC
    $string = str_replace('[[TOC]]', Parsedown::instance()->text(file_get_contents_or_default($lang, '/toc/' . $toc . '.md')), $string);

    // Replace the languages
    $string = str_replace('[[LANGS]]', $langs, $string);

    file_put_contents($folder . $lang . DIRECTORY_SEPARATOR . $file . '.html', $string);
}

function file_get_contents_or_default($lang, $file) {
    if (file_exists('source' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . $file))
        return file_get_contents('source' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR . $file);
    else
        return file_get_contents('source' . DIRECTORY_SEPARATOR . 'en' . DIRECTORY_SEPARATOR . $file);
}

function processReplacements($lang, $string) {
    // Replace the nav bar
    $string = str_replace('[[PRODUCTNAME]]', PRODUCT_NAME, $string);
    $string = str_replace('[[PRODUCTVERSION]]', PRODUCT_VERSION, $string);
    $string = str_replace('[[PRODUCTHOME]]', PRODUCT_HOME, $string);
    $string = str_replace('[[PRODUCTSUPPORTURL]]', PRODUCT_SUPPORT_URL, $string);
    $string = str_replace('[[PRODUCTFAQURL]]', PRODUCT_FAQ_URL, $string);

    return $string;
}

/**
 * Copy a file, or recursively copy a folder and its contents
 * @param       string   $source    Source path
 * @param       string   $dest      Destination path
 * @param       string   $permissions New folder creation permissions
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
        xcopy("$source/$entry", "$dest/$entry");
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
            delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }
    else if (is_file($path) === true) {
        return unlink($path);
    }

    return false;
}
?>
