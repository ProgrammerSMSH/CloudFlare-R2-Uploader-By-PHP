<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

require 'vendor/autoload.php';

use Aws\S3\S3Client;

$accountId = "YOUR_ACCOUNT_ID";
$bucketName = "YOUR_BUCKET_NAME";
$accessKey = "YOUR_ACCESS_KEY";
$secretKey = "YOUR_SECRET_KEY";

try {
    $s3 = new S3Client([
        'region'      => 'auto',
        'version'     => 'latest',
        'endpoint'    => "https://$accountId.r2.cloudflarestorage.com",
        'credentials' => [
            'key'    => $accessKey,
            'secret' => $secretKey,
        ],
    ]);

    $file = $_GET['file'] ?? null;
    if (!$file) {
        throw new Exception("No file specified");
    }

    // Generate presigned URL (browser will PUT file here)
    $cmd = $s3->getCommand('PutObject', [
        'Bucket' => $bucketName,
        'Key'    => $file,
    ]);
    $request = $s3->createPresignedRequest($cmd, '+30 minutes');
    $presignedUrl = (string) $request->getUri();

    echo json_encode([
        "success" => true,
        "url"     => $presignedUrl
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error"   => $e->getMessage()
    ]);
}
