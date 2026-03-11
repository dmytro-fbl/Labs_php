<?php
session_start();
require_once 'db.php';
/** @var PDO $pdo */

$action = $_GET['page'] ?? '';

if ($action == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_login'] = $user['login'];
        header("Location: index.php?msg=login");
        exit();
    }else{
        die("Помилка: Невірний логін або пароль. <a href='index.php'>Назад</a>");
    }
}

if ($action == 'register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $check = $pdo->prepare("SELECT * FROM users WHERE login = ? OR email = ?");
    $check->execute([$login, $email]);
    if($check->fetch()){
        die("Користувач вже існує <a href='index.php?page=register'>Назад</a>");
    }
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (login, password, email, first_name,
                   last_name, phone, birth_date, country, avatar_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    try{
        $stmt->execute([
            $login,
            $hashPassword,
            $email,
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['phone'],
            $_POST['birth_date'],
            $_POST['country'],
            $_POST['avatar_url'],
        ]);
        header("Location: index.php?msg=register");
    }catch (PDOException $e){
        die("Помилка запису в базу: " . $e->getMessage());
    }
}

if ($action == 'logout') {
    $_SESSION = [];
    if(ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header('Location: index.php?msg=logout');
    exit();
}

if ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $params = [
        $_POST['login'],
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['phone'],
        $_POST['country'],
        $_POST['avatar_url'],
        $_POST['email'],
        $_POST['birth_date']
    ];

    $sql = "UPDATE users SET login = ?, first_name = ?, last_name = ?, phone = ?,
                country = ?, avatar_url = ?, email = ?, birth_date = ?";

    if (!empty($_POST['password'])) {
        $sql .= ", password = ?";
        $params[] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    $sql .= " WHERE id = ?";
    $params[] = $userId;

    $stmt = $pdo->prepare($sql);
    try{
        $stmt->execute($params);


        $_SESSION['user_login'] = $_POST['login'];
        header('Location: index.php?msg=update');
        exit();
    }catch (PDOException $e){
        die("Помилка оновлення" . $e->getMessage());
    }
}

if ($action == 'delete') {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    header('Location: index.php?msg=deleted');
    exit();
}
