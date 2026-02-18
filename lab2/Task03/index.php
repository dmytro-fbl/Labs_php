<?php
session_start();
$login = $_SESSION ['login'] ?? '';
$password = $_SESSION ['password'] ?? '';
$passwordReplace = $_SESSION ['passwordReplace'] ?? '';
$gender = $_SESSION ['gender'] ?? '';
$city = $_SESSION ['city'] ?? '';
$favoriteGames = $_SESSION ['favoriteGames'] ?? [];
$about = $_SESSION ['about'] ?? '';
$photo = $_SESSION ['photo'] ?? '';

if(isset($_GET['language'])){
    $language = $_GET['language'];

    $Months6 = 6*30*24*60*60;
    setcookie("language", $language, time() + $Months6);
    $_COOKIE["language"] = $language;
}

$selectLanguage = $_COOKIE['language'] ?? 'ukr';
$Text = match($selectLanguage) {
    'ukr' => "Мова: Українська",
    'eng' => "Language: English",
    'ger' => "Sprache: Deutsch ",
    default => "Мова: Українська",
};
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
<form action="formCheck.php" method="post" enctype="multipart/form-data">
    <label for="login">Логін:</label>
    <input type="text" name="login" value="<?= htmlspecialchars($login) ?>" required> <br><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" value="<?= htmlspecialchars($password) ?>" required> <br><br>

    <label for="passwordReplace">Пароль (ще раз):</label>
    <input type="password" name="passwordReplace" value="<?= htmlspecialchars($passwordReplace) ?>" required> <br><br>

    <label for="gender">Стать:</label>
    <input type="radio" name="gender" value="Чоловік"
        <?= $gender === "Чоловік" ? "checked" : '' ?>> Чоловік
    <input type="radio" name="gender" value="Жінка"
        <?= $gender === "Жінка" ? "checked" : '' ?>> Жінка<br><br>

    <label for="city">Місто:</label>
    <select name="city" id="city">
        <option value="Житомир" <?= $city === "Житомир" ? "selected" : '' ?>>Житомир</option>
        <option value="Львів" <?= $city === "Львів" ? "selected" : '' ?>>Львів</option>
        <option value="Київ" <?= $city === "Київ" ? "selected" : '' ?>>Київ</option>
        <option value="Одеса" <?= $city === "Одеса" ? "selected" : '' ?>>Одеса</option>
    </select><br><br>

    <label for="favoriteGames">Улюблені ігри:</label>
    <input type="checkbox" name="favoriteGamesArr[]" value="Футбол"
        <?= in_array("Футбол", $favoriteGames) ? 'checked' : '' ?>>Футбол
    <input type="checkbox" name="favoriteGamesArr[]" value="Баскетбол"
        <?= in_array("Баскетбол", $favoriteGames) ? 'checked' : '' ?>>Баскетбол
    <input type="checkbox" name="favoriteGamesArr[]" value="волейбол"
        <?= in_array("волейбол", $favoriteGames) ? 'checked' : '' ?>>волейбол
    <input type="checkbox" name="favoriteGamesArr[]" value="шахи"
        <?= in_array("шахи", $favoriteGames) ? 'checked' : '' ?>>шахи
    <input type="checkbox" name="favoriteGamesArr[]" value="world of tanks"
        <?= in_array("world of tanks", $favoriteGames) ? 'checked' : '' ?>>world of tanks<br><br>

    <label for="about">Про себе:</label>
    <textarea name="about" id="about" cols="30" rows="10" <?= htmlspecialchars($about) ?>></textarea><br><br>

    <label for="photo">Фотографія:</label>
    <input type="file" name="photo" required><br><br>

    <input type="submit" value="Зареєструватись">
</form>

<h2>Виберіть мову:</h2>
<a class="icon" href="index.php?language=ukr">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/960px-Flag_of_Ukraine.svg.png" alt="Українська" width="50">
</a>
<a class="icon" href="index.php?language=eng">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/1280px-Flag_of_the_United_Kingdom_%283-5%29.svg.png" alt="English" width="50">
</a>
<a class="icon" href="index.php?language=ger">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/3840px-Flag_of_Germany.svg.png" alt="Germany" width="50">
</a>

<h2><?= $Text ?></h2>
</body>
</html>

