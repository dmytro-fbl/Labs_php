<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=company_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM employees");

    $sql = "SELECT * FROM employees";
    $result = $pdo->query($sql);
    include "View/selectAll.php";
}catch (PDOException $e){
    echo $e->getMessage();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="View/addEmploe">Додати</a>

<h2>Середня заробітня плата Працівників</h2><br><br>
<?php include "script.php";?>
</body>
</html>
