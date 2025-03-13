<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\AIPlatform\V1\GenerateContentRequest;
use Google\Cloud\AIPlatform\V1\GenerationConfig;
use Google\Cloud\AIPlatform\V1\ModelServiceClient;
use Google\Cloud\AIPlatform\V1\Part;

// サービスアカウントの認証情報ファイルのパス
$credentialsPath = 'path/to/your/credentials.json';

// プロジェクトIDとリージョン
$projectId = 'your-project-id';
$location = 'your-location'; // 例: us-central1

// モデル名
$modelName = "projects/{$projectId}/locations/{$location}/publishers/google/models/gemini-1.0-pro";

// ユーザーからのプロンプトを取得
$prompt = $_POST['prompt'];

// マニュアルの概要や専門用語の説明（コンテキスト情報）
$context = "このマニュアルは、〇〇という製品に関するものです。〇〇とは、〇〇するためのものです。専門用語として、〇〇、〇〇などがあります。";

// データベースから関連情報を取得
// 例: $db->query('SELECT * FROM manual WHERE keywords LIKE ?', '%' . $prompt . '%');
// 実際のデータベースに合わせてクエリを調整してください。
$manualInfo = "関連するマニュアル情報:"; // 仮の情報

// プロンプトの作成
$prompt = $context . "\n\n" . $manualInfo . "\n\n" . "質問: " . $prompt . "\n\n回答:";

// モデルサービスクライアントの初期化
$modelServiceClient = new ModelServiceClient([
    'credentials' => $credentialsPath,
]);

// リクエストの作成
$contents = [
    (new Part())->setText($prompt),
];

$generationConfig = (new GenerationConfig());

$request = (new GenerateContentRequest())
    ->setModel($modelName)
    ->setContents($contents)
    ->setGenerationConfig($generationConfig);

// ストリーミングレスポンスを有効にする
$responseStream = $modelServiceClient->generateContentStream($request);

// レスポンスを順次送信
foreach ($responseStream->readAll() as $response) {
    $generatedContentPart = $response->getCandidates()[0]->getContent()->getParts()[0]->getText();
    echo $generatedContentPart;
    flush();
    ob_flush();
}

// モデルサービスクライアントのクローズ
$modelServiceClient->close();
?>
