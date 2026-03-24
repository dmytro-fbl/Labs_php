<?php
require_once 'Response.php';

use task5\Response;

$response = new Response();

$response->setStatus(200)
        ->addHeader("Content-Type: text/html; charset=utf-8");
        echo 'сміття в буфері';
$response->send("<h1>Вітаємо!</h1><p>Це динамічна відповідь.</p>");