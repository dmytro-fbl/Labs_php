<?php
if (isset($_GET['size'])) {
    $fontSize = $_GET['size'];
    setcookie('user_font', $fontSize, time() + (24 * 30 * 60 * 60), "/");
    header('Location: index.php');
    exit;
}
$currentSize = isset($_COOKIE['user_font']) ? $_COOKIE['user_font'] : '16px';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: <?php echo htmlspecialchars($currentSize); ?>;
        }
    </style>
</head>
<body>
<div class="controls">
    <a href="index.php?size=36px">Великий шрифт</a>|
    <a href="index.php?size=24px">Середній шрифт</a>|
    <a href="index.php?size=12зч">Малий шрифт</a>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ipsam non nostrum. Assumenda eius eligendi
    impedit quasi quis vero voluptas. Cumque doloribus eveniet labore nostrum, repellendus rerum? Architecto est,
    excepturi.</p>
</body>
</html>
