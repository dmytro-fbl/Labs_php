<?php
header('Content-Type: application/json');
try{
    $pdo = new PDO("mysql:host=localhost;dbname=lab6", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die(json_encode(['error' => 'Помилка підключення' . $e->getMessage()]));
}

$action = $_GET['action'];
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($action == "list"){
    $stmt = $pdo->query("SELECT * FROM notes ORDER BY  id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

}elseif ($action == "create") {
    if(empty(trim($data['title'])) || empty(trim($data['text']))) {
        echo json_encode(['error' => 'Заголовок та текст обов\'язкові']);
        return;
    }
    $stmt = $pdo->prepare("INSERT INTO notes (title, text) VALUES (?, ?)");
    $stmt->execute([$data['title'], $data['text']]);
    echo  json_encode(['message' => 'Створена замітка']);
}

elseif ($action == "update") {
    if(empty(trim($data['title'])) || empty(trim($data['text'])) || empty(trim($data['id']))) {
        echo json_encode(['error' => 'Всі поля обов\'язкові для оновлення']);
        return;
    }

    $stmt = $pdo->prepare("UPDATE notes SET title = ?, text = ? WHERE id = ?");
    $stmt->execute([$data['title'], $data['text'], $data['id']]);
    echo json_encode(['message' => 'Замітку оновлено']);
}

elseif ($action == "delete") {
    if (empty($data['id'])) {
        echo json_encode(['error' => 'ID не знайдено']);
        return;
    }
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$data['id']]);
    echo json_encode(['message' => 'Замітку видалено']);
}else{
    echo json_encode(['error' => 'Невідома дія']);
}
?>
