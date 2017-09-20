<?php
include_once('libraries/parsedown/parsedown.php');
include_once('manualgenerator.class.php');

$argv = $GLOBALS['argv'];

$template = isset($argv[1]) ? $argv[1] : 'default';

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

