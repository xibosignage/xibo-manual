<?php
include_once('libraries/parsedown/parsedown.php');
include_once('manualgenerator.class.php');
include_once('template/template.php');

$argv = $GLOBALS['argv'];

$footer = isset($argv[0]) ? $argv[0] : null;

// Generates a complete manual.
$manual = new ManualGenerator(PRODUCT_NAME, PRODUCT_HOME, PRODUCT_SUPPORT_URL, PRODUCT_FAQ_URL);
$manual->overrideFooter = $footer;
$manual->build('', 'output/');

?>
