<?php

use Couchbase\User;

header('Content-Type: application/json');
$host = 'localhost';
$dbname = 'lab6';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("Помилка підключення: " . $e->getMessage());
}


function register($pdo)
{
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (empty($data['name']) || empty($data['email']) || empty($data['password'])){
        echo json_encode(['error' => 'Всі поля обов\'язкові']);
        return;
    }
    if(strlen($data['password']) < 6){
        echo json_encode(['error' => 'Пароль має містити більше 6 символів']);
        return;
    }
    try{
        $stmt = $pdo-> prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if($stmt->fetch()){
            echo json_encode(['error' => 'Ця почта вже існує']);
            return;
        }
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $insert->execute([$data['name'], $data['email'], $hash]);

        echo json_encode(['message' => 'Користувача успішно створено']);

    }catch (PDOException $e){
        echo json_encode(['error' => 'помилка БД: ' . $e->getMessage()]);
    }
}

function getUserList($pdo)
{
    try{
        $stmt = $pdo-> prepare("SELECT id, name, email FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }catch (PDOException $e){
        echo json_encode(['error' => 'Не вдалось вивести список користувачів' . $e->getMessage()]);
    }
}



function login($pdo){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password, $user['password'])){
            echo json_encode([
                'status' => 'success',
                'message' => 'Ласкаво просимо, ' . $user['name'] . '!'
            ]);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Невірний пароль']);
        }
    }else{
        echo json_encode(['status' => 'error', 'message' => 'Даного користувача з такою почтою немає']);
    }
}

function delete($pdo)
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);

    $id = $data['id'] ?? null;

    if (!$id) {
        echo json_encode(['error' => 'ID користувача не знайдено']);
        return;
    }

    try{
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['message' => 'Видалено користувача']);
    }catch (PDOException $e){
        echo json_encode(['error' => 'Помилка видалення: ' . $e->getMessage()]);
    }
}

function edit($pdo)
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);

    try{
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['email'], $data['id']]);
        echo json_encode(['message' => 'Успішно оновлено']);
    }catch (PDOException $e){
        echo json_encode(['error' => 'Помилка оновлення: ' . $e->getMessage()]);
    }
}

$action = $_GET['action'] ?? '';
if($action === 'register'){
    register($pdo);
}elseif($action === 'list') {
    getUserList($pdo);
}elseif ($action === 'login') {
    login($pdo);
}elseif ($action === 'delete') {
    delete($pdo);
}elseif ($action === 'update') {
    edit($pdo);
}else{
    echo json_encode(['error' => 'Подія не знайдена']);
}
?>