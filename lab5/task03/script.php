<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT AVG(salary) AS average_salary FROM employees";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

    $average = round($row['average_salary'], 2);

    echo "<h3>Аналітика компанії</h3>";
    echo "Середня заробітна плата працівників: " . $average . " грн.";

} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>