<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $sql = "INSERT INTO employees(name, position, salary) VALUES ('$name', '$position', '$salary')";
        $stmt = $pdo->exec($sql);
        if($stmt){
            echo "<p>Успішно додано!</p>";
            echo "<a href='../index.php'>Повернутися до списку</a>";
            echo "<a href='addEmploe.php'>Додати ще</a>";
            exit();
        }
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
?>

<form action="addEmploe.php" method="post">
    <label>Ім'я</label><br>
    <input type="text" name="name" required><br><br>

    <label>Позиція</label><br>
    <input type="text" name="position" required><br><br>

    <label>Зарплатня</label><br>
    <input type="number" name="salary" required><br><br>

    <button type="submit">Додати</button>
</form>
<br>
<a href="../index.php">Скасувати</a>
