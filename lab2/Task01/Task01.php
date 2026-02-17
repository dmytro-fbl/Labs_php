<?php
$output = "";

//1.1
if(isset($_POST["newTextSubmit"])){
    $text = $_POST["text"] ?? "";
    $find = $_POST["find"] ?? "";
    $rename = $_POST["rename"] ?? "";
    $result = str_replace($find, $rename, $text);
    $output = "Новий рядок: " . $result;
}

//1.2
function sortCites($citiesStr)
{
    $arr = explode(" ", $citiesStr);
    sort($arr, SORT_STRING | SORT_FLAG_CASE);
    return implode(" ", $arr);
}

if(isset($_POST["citiesSubmit"])){
    $citiesStr = $_POST["citiesStr"] ?? "";
    $result = sortCites($citiesStr);
    $output = "Відсортовані міста: " . $result;
}

//1.3
function nameFile($strUrlFile)
{
    $arr = str_replace("\\", "/", $strUrlFile);
    return pathinfo($arr, PATHINFO_FILENAME);
}

if(isset($_POST["nameFileSubmit"])){
    $nameFile = $_POST["urlFile"] ?? "";
    $result = nameFile($nameFile);
    $output = "Назва файлу: " . $result;
}

//1.4
function numberDays($strStartDate, $strEndDate)
{
    $pattern = "/^\d{2}[.-]\d{2}[.-]\d{4}$/";
    if(!preg_match($pattern, $strStartDate) || !preg_match($pattern, $strEndDate))
        return "Помилка дати";

    $dateStart = new DateTime($strStartDate);
    $dateEnd = new DateTime($strEndDate);
    $interval = $dateStart->diff($dateEnd);
    return $interval->days;
}
if(isset($_POST["numberDaysSubmit"])){
    $startDate = $_POST["startDate"] ?? "";
    $endDate = $_POST["endDate"] ?? "";
    $result = numberDays($startDate, $endDate);
    $output = "Кількість днів між датами: " . $result;
}

//1.5
$result = "";
$createPassword = $_POST["createPassword"] ?? null;
function generatePassword($length)
{
    $chars = "qwertyuiopasdfghjklzxcvbnm";
    $chars .= "0123456789";
    $chars .= "QWERTYUIOPASDFGHJKLZXCVBNM";
    $chars .= "!@#$%^&*()";

    $password = "";
    $maxIndex = strlen($chars) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $maxIndex)];
    }
    return $password;
}


function isStrongPassword($password)
{
    if (strlen($password) < 8 ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[0-9]/', $password) ||
            !preg_match('/[$@#*]/', $password) ) {
        return false;
    }

    return true;
}

if (isset($_POST["generatePasswordSubmit"])) {
    $passwordLength = $_POST["lengthPassword"];

    $createPassword = generatePassword($passwordLength);

    $output = "Згенерований пароль: " . $createPassword;

}

if (isset($_POST["checkPasswordSubmit"])) {
    $passwordToCheck = $_POST["passwordCheck"];
    $createdPassword = $passwordToCheck;

    if (isStrongPassword($createPassword)) {
        $result = "Пароль міцний";
    } else {
        $result = "Пароль слабкий";
    }
}
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
<p><?= $output?> </p>

<?php if(isset($createPassword)) : ?>
<form action="" method="post">
    <label>Перевірити пароль:</label>
    <input type="text" name="passwordCheck" value="<?= htmlspecialchars($createPassword) ?>"><br>
    <input type="hidden" name="createPassword" value="<?= htmlspecialchars($createPassword) ?>">
    <input type="submit" name="checkPasswordSubmit">
</form>
    <?php if ($result !== "") : ?>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>
<?php endif; ?>
<a href="index.html">Назад до завдань</a>
</body>
</html>
