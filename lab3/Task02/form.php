<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$error = "";
    if(isset($_POST["submitPassword"])){
        $login = $_POST["login"];
        $password = $_POST["password"];
        if($login == "admin" && $password == "password"){
            $_SESSION['auth'] = true;
            $_SESSION['user'] = "Admin";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }else{
            $error = "Невіриний логін або пароль";
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
<?php
if(isset($_SESSION["auth"]) && $_SESSION["auth"] === true):
?>
<h1>Добрий день, <?php echo $_SESSION["user"]; ?>!</h1>
    <p><a href="?logout=1">Вийти з системи</a></p>

<?php else:?>
<?php if($error): ?>
        <p><?php echo $error; ?></p>
    <?php endif;?>
<form action="" method="post">
    <label for="login">Логін</label>
    <input type="text" name="login">
    <label for="password">Пароль</label>
    <input type="password" name="password">
    <input type="submit" name="submitPassword" value="відправити">
</form>
<?php endif;?>
</body>
</html>
