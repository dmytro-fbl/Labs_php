<?php
if(isset($_POST['submit_login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $folderToDelete = "logins/$login";

    $filePassword = $folderToDelete . "/password.txt";
    if(is_dir($folderToDelete)){

        $path = fopen($filePassword, "r");
        $passFromFile = fgets($path);
        $passFromFile = trim($passFromFile);
        fclose($path);
        if($passFromFile === $password ){
            echo "пароль вірний.\n";

            $contentDirs = ["video", "music", "photo"];
            foreach($contentDirs as $contentDir){
                $path = $folderToDelete . "/" . $contentDir;

                if(file_exists($path)){
                    $filePath = $path . "/info.txt";
                    unlink($filePath);
                }
                rmdir($path);
                if(file_exists($filePassword)){
                    unlink($filePassword);
                }
            }
            rmdir($folderToDelete);
            echo "Видалення успішне";
        }else{
            echo "Пароль не вірний не можливо видалити";
        }

    }else{
        echo "Папки не існує";
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
<form action="" method="post">
    <label for="login">Логін</label>
    <input type="text" name="login" required>
    <label for="password">Пароль</label>
    <input type="password" name="password" required>
    <input type="submit" name="submit_login" value="Зареєструватись">
</form>
<a href="form.php">Створити папку</a>
</body>
</html>