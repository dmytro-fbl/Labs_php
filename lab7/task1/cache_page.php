<?php

$cacheFile = 'cache.html';

$requestedStatus = $_GET["status"] ?? 200;

if(file_exists($cacheFile) && $requestedStatus === 200 && filesize($cacheFile) > 0) {
    echo "\n";
    echo file_get_contents($cacheFile);
    exit;
}

ob_start();

if($requestedStatus == 404) {
    http_response_code(404);
    echo "<h1>Помилка 404</h1>";
    echo "<p>Сторінку не знайдено</p>";
}else{
    http_response_code(200);

    echo "Головна сторінка";
    echo "<p>Час генерації:" . date('H:i:s') . "</p>";
}

$currentStatus = http_response_code();

if($currentStatus == 200) {
    $pageContent = ob_get_contents();
    file_put_contents($cacheFile, $pageContent);
}elseif($currentStatus == 404) {
    if(file_exists($cacheFile)) {
        unlink($cacheFile);
    }
}

ob_end_flush();
?>