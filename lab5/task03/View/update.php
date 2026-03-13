<?php

$pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':position' => $position,
        ':salary' => $salary,
        ':id' => $id
    ]);

    header("Location: ../index.php");
    exit();
}

$employee_id = $_GET['id'] ?? '';

if ($employee_id){
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$employee_id]);
    $employee = $stmt->fetch();
    if(!$employee){
        die("Працівника не знайдено");
    }
}
?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $employee['id']?>">
    <label>Ім'я</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required><br><br>

    <label>Позиція</label><br>
    <input type="text" name="position" value="<?= htmlspecialchars($employee['position']) ?>" required><br><br>

    <label>Зарплатня</label><br>
    <input type="number" name="salary" value="<?= $employee['salary'] ?>" required><br><br>

    <button type="submit">Додати</button>
</form>
<br>
<a href="../index.php">Скасувати</a>
