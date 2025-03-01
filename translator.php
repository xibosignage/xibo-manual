<?php

// Google Cloud Translation API credentials
$apiKey = 'YOUR_API_KEY'; // Replace with your API key

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

    // Translate content using Google Cloud Translation API
    $translatedContent = translateText($content, $apiKey); // Translate the content

    // Save translated content to the output directory with the same file name
    $outputFilename = basename($inputFile); // Get the base file name
    $outputFile = $outputDir . $outputFilename; // Create the output file path
    file_put_contents($outputFile, $translatedContent); // Save the translated content to the output file

    echo "Translated file '$inputFile' to '$outputFile'.\n"; // Print the translation result
}

/**
 * Translates text using Google Cloud Translation API.
 *
 * @param string $text The text to translate.
 * @param string $apiKey The API key for Google Cloud Translation.
 * @return string The translated text.
 */
function translateText(string $text, string $apiKey): string
{
    $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $apiKey; // API endpoint
    $data = [
        'q' => $text, // Text to be translated
        'source' => 'en', // Source language
        'target' => 'ja', // Target language
        'format' => 'text' // Format of the input text
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n", // HTTP header
            'method' => 'POST', // HTTP method
            'content' => json_encode($data) // Request body
        ]
    ];

    $context = stream_context_create($options); // Create stream context
    $result = file_get_contents($url, false, $context); // Send request to API
    $response = json_decode($result, true); // Decode the JSON response

    return $response['data']['translations'][0]['translatedText']; // Return the translated text
}
?>
