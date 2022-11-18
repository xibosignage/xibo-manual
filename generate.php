<?php
require_once 'vendor/autoload.php';
include_once('manualgenerator.class.php');

$argv = $GLOBALS['argv'];

$template = isset($argv[1]) ? $argv[1] : 'default';

echo 'Including Template: ' . $template . PHP_EOL;

if (file_exists('template/custom/' . $template . '/template.php'))
    include_once 'template/custom/' . $template . '/template.php';
else
    include_once 'template/default/template.php';

// Generates a complete manual.
$manual = new ManualGenerator(
    PRODUCT_NAME,
    PRODUCT_HOME,
    PRODUCT_SUPPORT_URL,
    PRODUCT_FAQ_URL,
    $template);

$manual->build('', 'output/');

// Tar up the images in `output/en/img`
shell_exec('cd output; tar -czvf images.tar.gz en/img');
