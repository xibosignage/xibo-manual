<?php
/*
 * Copyright (C) 2025 Open Source Digital Signage Initiative.
 *
 * You can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * You should have received a copy of the GNU Affero General Public License.
 * see <http://www.gnu.org/licenses/>.
 */

require 'vendor/autoload.php'; // Composerのオートローダー

use Google\Cloud\Translate\V3\TranslationServiceClient;
use Google\Cloud\Translate\V3\TranslateTextGlossaryConfig;

// Google Cloud Translation API credentials
$projectId = 'YOUR_PROJECT_ID'; // Replace with your Project ID
$location = 'global'; // or e.g., 'us-central1'
$glossaryId = 'YOUR_GLOSSARY_ID'; // Replace with your Glossary ID
$glossaryUri = 'gs://YOUR_BUCKET_NAME/YOUR_GLOSSARY_FILE.csv'; // Replace with your Glossary URI.

// Input and output directories
$inputDir = 'source/en/';
$outputDir = 'source/ja/';

// Create output directory if it doesn't exist
if (!file_exists($outputDir)) {
    mkdir($outputDir, 0755, true); // Create directory recursively
}

// Get input file names from command line arguments
$inputFiles = $argv;
array_shift($inputFiles); // Remove script name from arguments

// If no input file names are provided, use all .md files in the input directory
if (empty($inputFiles)) {
    $inputFiles = glob($inputDir . '*.md'); // Get all .md files from input directory
} else {
    // Prepend input directory to the provided file names
    foreach ($inputFiles as &$inputFile) {
        $inputFile = $inputDir . $inputFile; // Add input directory to each file name
    }
}

// Process each input file
foreach ($inputFiles as $inputFile) {
    // Read file content
    $content = file_get_contents($inputFile); // Read content from the input file

    // Translate content using Google Cloud Translation API with glossary
    $translatedContent = translateTextWithGlossary($content, $projectId, $location, $glossaryId, $glossaryUri); // Translate the content

    // Save translated content to the output directory with the same file name
    $outputFilename = basename($inputFile); // Get the base file name
    $outputFile = $outputDir . $outputFilename; // Create the output file path
    file_put_contents($outputFile, $translatedContent); // Save the translated content to the output file

    echo "Translated file '$inputFile' to '$outputFile'.\n"; // Print the translation result
}

/**
 * Translates text using Google Cloud Translation API with glossary.
 *
 * @param string $text The text to translate.
 * @param string $projectId The Google Cloud Project ID.
 * @param string $location The location for the API.
 * @param string $glossaryId The ID of the glossary.
 * @param string $glossaryUri The Cloud Storage URI of the glossary.
 * @return string The translated text.
 */
function translateTextWithGlossary(string $text, string $projectId, string $location, string $glossaryId, string $glossaryUri): string
{
    $translationServiceClient = new TranslationServiceClient();
    $parent = $translationServiceClient->locationName($projectId, $location);

    $glossary = $translationServiceClient->glossaryName($projectId, $location, $glossaryId);
    $glossaryConfig = (new TranslateTextGlossaryConfig())
        ->setGlossary($glossary);

    $response = $translationServiceClient->translateText(
        [
            'parent' => $parent,
            'contents' => [$text],
            'mimeType' => 'text/plain',
            'sourceLanguageCode' => 'en',
            'targetLanguageCode' => 'ja',
            'glossaryConfig' => $glossaryConfig,
        ]
    );

    return $response->getGlossaryTranslations()[0]->getTranslatedText();
}
?>
