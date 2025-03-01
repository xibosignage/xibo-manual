<?php

// Google Cloud Translation API の認証情報を設定します
//$apiKey = 'YOUR_API_KEY';
$apiKey = 'AIzaSyDAI1-JW5SgZ0rdq5e57i6MVHXEaKZ7uYk';

$inputDir = 'source/en/';
$outputDir = 'source/ja/';

// 出力ディレクトリが存在しない場合は作成します
if (!file_exists($outputDir)) {
    mkdir($outputDir, 0755, true);
}

// コマンドライン引数から入力ファイル名を取得します
$inputFiles = $argv;
array_shift($inputFiles); // スクリプト名を除外

// 入力ファイル名の指定がない場合は、source/en/ の全ての .md ファイルを対象とします
if (empty($inputFiles)) {
    $inputFiles = glob($inputDir . '*.md');
} else {
    // 指定されたファイル名に source/en/ ディレクトリを追加します
    foreach ($inputFiles as &$inputFile) {
        $inputFile = $inputDir . $inputFile;
    }
}

// 各入力ファイルに対して翻訳を実行します
foreach ($inputFiles as $inputFile) {
    // ファイルの内容を読み込みます
    $content = file_get_contents($inputFile);

    // Google Cloud Translation API を使用して翻訳します
    $translatedContent = translateText($content, $apiKey);

    // 翻訳された内容を、source/ja/ に元のファイル名と同じ名前のファイルとして保存します
    $outputFilename = basename($inputFile);
    $outputFile = $outputDir . $outputFilename;
    file_put_contents($outputFile, $translatedContent);

    echo "ファイル '$inputFile' を翻訳し、'$outputFile' に保存しました。\n";
}

/**
 * Google Cloud Translation API を使用してテキストを翻訳します。
 *
 * @param string $text 翻訳するテキスト
 * @param string $apiKey API キー
 * @return string 翻訳されたテキスト
 */
function translateText(string $text, string $apiKey): string
{
    $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $apiKey;
    $data = [
        'q' => $text,
        'source' => 'en',
        'target' => 'ja',
        'format' => 'text'
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    return $response['data']['translations'][0]['translatedText'];
}
?>
