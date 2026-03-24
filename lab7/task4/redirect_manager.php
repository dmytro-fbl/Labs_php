<?php
ob_start();

$requestedUrl = $_GET["url"] ?? '/';

$jsonFile = 'redirects.json';

if(file_exists($jsonFile)) {
    $redirects = json_decode(file_get_contents($jsonFile), true);

    if(isset($redirects[$requestedUrl])) {
        $destination = $redirects[$requestedUrl];

        if($destination === '/404'){
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            echo "<p>Сторінка була видалення або старіла</p>";
        }else{
            header("Location: $destination", true, 301);
            exit;
        }
    }else{
        http_response_code(200);
        echo "<h1>Головна сторінка</h1>";
    }
}else{
    echo "Помилка: Файл json не знайдено";
}
ob_end_flush();
?>