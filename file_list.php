<?php
$dir = __DIR__ . "/storage";
$files = [];

if (is_dir($dir)) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
    );
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $files[] = $iterator->getSubPathName();
        }
    }
}

header('Content-Type: application/json');
echo json_encode($files);
