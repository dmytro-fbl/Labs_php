<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=lab7;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtTotal = $pdo->query("SELECT COUNT(*) FROM traffic_logs WHERE request_time >= NOW() - INTERVAL 1 DAY");
    $totalRequests = $stmtTotal->fetchColumn();

    $stmt404 = $pdo->query("SELECT COUNT(*) FROM traffic_logs WHERE http_status = 404 AND request_time >= NOW() - INTERVAL 1 DAY");
    $errors404 = $stmt404->fetchColumn();

    echo "<h1>Статистика за 24 години</h1>";
    echo "Загальна кількість запитів: $totalRequests";
    echo "Кількість помилок 404: $errors404";

    if($totalRequests > 0){
        $errorPercentage = ($errors404 / $totalRequests) * 100;

        echo "<br>Відсоток помилок 404:" . round($errorPercentage) . "%";
        if($errorPercentage > 10){
            echo "<p>УВАГА КІЛЬКСТЬ ПОМИЛОК 404 БІЛЬШЕ 10%</p>";
        }
    }
}catch (PDOException $e){
    die("Помилка доступу до бази даних" . $e->getMessage());
}