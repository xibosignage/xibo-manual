<?php
include_once('libraries/parsedown/parsedown.php');
include_once('manualgenerator.class.php');
include_once('template/template.php');

// Generates a complete manual.
$manual = new ManualGenerator(PRODUCT_NAME, PRODUCT_HOME, PRODUCT_SUPPORT_URL, PRODUCT_FAQ_URL);
$manual->build('', 'output/');

?>
