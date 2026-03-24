<?php

$logFile = 'requests.log';
$limit = 5;
$timeFrame = 60;

$ip = $_SERVER['REMOTE_ADDR'];
$currentTime = time();

$lines = [];
$requestCount = 0;
if(file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($lines as $line) {
        list($loIp, $logTime) = explode('|', $line);

        if(($currentTime - (int)$logTime) <= $timeFrame) {
            $validRecords[] = $line;
        }

        if($loIp == $ip) {
            $requestCount++;
        }
    }
}

$validRecords[] = "$ip|$currentTime";

file_put_contents($logFile, implode("\n", $validRecords));

ob_start();

if($requestCount >= $limit) {
    http_response_code(429);
    echo "<h1>429 Too Many Requests</h1>";
    echo "<p>Перевищено ліміт запитів. Спробуйте через хвилину.</p>";
}else{
    http_response_code(200);
    echo "<h1>200 OK</h1>";
}

ob_end_flush();
?>