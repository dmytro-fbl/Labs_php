<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST["login"] ?? '';
    $password = $_POST['password'] ?? '';
    $passwordReplace = $_POST ['passwordReplace'] ?? '';
    $gender = $_POST ['gender'] ?? '';
    $city = $_POST ['city'] ?? '';
    $favoriteGames = $_POST ['favoriteGamesArr'] ?? [];
    $about = $_POST ['about'] ?? '';
    $photo = $_POST ['photo'] ?? '';

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['passwordReplace'] = $passwordReplace;
    $_SESSION['gender'] = $gender;
    $_SESSION['city'] = $city;
    $_SESSION['favoriteGamesArr'] = $favoriteGames;
    $_SESSION['about'] = $about;
    $_SESSION['photo'] = $photo;

    $passwordCheck = ($password != $passwordReplace) ? "пароль не співпадає" : "Пароль спвіпадає";

    $photoPath = '';

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === 0){
        $uploadedDir = "uploadPhotos/";
        if(!is_dir($uploadedDir)){
            mkdir($uploadedDir);
        }
        $fileName = time() . "_" . basename($_FILES['photo']['name']);
        $targetFileName = $uploadedDir . $fileName;
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetFileName);
        $photoPath = $targetFileName;
    }
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ваші дані</h1>
<p>Логін: <?= htmlspecialchars($login)?></p>
<p>Пароль: <?= htmlspecialchars($passwordCheck)?></p>
<p>Стать: <?= htmlspecialchars($gender)?></p>
<p>Місто: <?= htmlspecialchars($city)?></p>
<p>Улюблені ігри:
    <?php
    if (!empty($favoriteGames)){
        echo implode(", ", $favoriteGames);
    }else{
        echo "не вказано";
    }
    ?></p>
<p>Про себе: <?= nl2br($about) ?></p>

<?php
if (!empty($photoPath)) : ?>
    <p>Фото <img src="<?= $photoPath?>" alt=""></p>
<?php else :?>
<p>Фото не змогло завантажитись</p>
    <?php endif; ?>
    <a href="index.php">Назад на головну</a>
</body>
</html>
