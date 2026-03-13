<?php
session_start();
require_once 'db.php';
/** @var PDO $pdo */

$page = $_GET['page'] ?? 'login';
$msg = $_GET['msg'] ?? '';

if ($msg == 'login') {
    echo "Вхід Успішний";
}elseif ($msg == 'logout') {
    echo "Успішний вихід";
}elseif ($msg == 'register') {
    echo "Успішна реєстрація";
}elseif ($msg == 'deleted') {
    echo "Успішно видалено акаунт";
}elseif ($msg == 'update') {
    echo "Успішно оновлено";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
</head>
<body>
<?php if(isset($_SESSION['user_id'])):
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    ?>

<h1>Вітаємо у системі!</h1>
<p>Ви увійшли як: <?php echo $_SESSION['user_login'];?></p>
    <img src="<?php echo htmlspecialchars($user['avatar_url'])?>" alt="Аватар" style="width: 200px; height: 200px"><br>

<p>Редагувати профіль</p>
<?php include 'Views/update.php' ?>

<a href="handler.php?page=logout">Вийти з акаунту</a>
<a href="handler.php?page=delete">Видалити Акаунт</a>

<?php else:
    echo "<h2>Вхід в систему</h2>";
if($page == 'login'){
    include 'Views/login.php';
}elseif($page == 'register'){
    include 'Views/registrationForm.php';
}
?>





<?php endif; ?>
</body>
</html>
