<?php

register_shutdown_function(function (){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=lab7;charset=utf8mb4', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $_SERVER['REQUEST_URI'];

        $status = http_response_code() ?: 200;

        $stmt = $pdo->prepare("INSERT INTO traffic_logs (ip_address, requested_url, http_status) VALUES(?,?,?)");
        $stmt->execute([$ip, $url, $status]);
    }catch (PDOException $e){
        error_log("Помилка traffic_logger" . $e->getMessage());
    }
});