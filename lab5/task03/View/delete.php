<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'] ?? null;
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM employees WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    header("Location: ../index.php");
    exit();
} catch (PDOException $e) {
    echo "Помилка Підключення: " . $e->getMessage();
}

?>
