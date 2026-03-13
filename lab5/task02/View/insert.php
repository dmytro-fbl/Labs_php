<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=lab5;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];

        $sql = "INSERT INTO tovar(name, cost, amount, date) VALUES ('$name', '$cost', '$amount', '$date')";
        $stmt = $pdo->exec($sql);
        if($stmt){
            echo "<p>Успішно додано: " . $stmt . " записів</p>";
            echo "<a href='../index.php'>Повернутися до списку</a>";
            echo "<a href='insert.php'>Додати ще</a>";
            exit();
        }
    }
}catch (Exception $e){
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
<h2>Введення нових записів</h2>
<form action="insert.php" method="post">
    <label>Назва товару</label><br>
    <input type="text" name="name" required><br><br>

    <label>Вартість</label><br>
    <input type="number" name="cost" required><br><br>

    <label>Кількість</label><br>
    <input type="number" name="amount" required><br><br>

    <label>Дата реалізації</label><br>
    <input type="date" name="date" required><br><br>

    <button type="submit">Зберегти</button>
</form>
<br>
<a href="../index.php">Скасувати</a>
</body>
</html>