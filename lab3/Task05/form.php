<?php
    if(isset($_POST['submit_login'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $nameDir = "logins/$login";
        if(!is_dir('logins')){
            mkdir('logins');
        }
        if(!is_dir($nameDir)){
            mkdir($nameDir, 0777, true);

            $filePathPasswords = "logins/$login/password.txt";
            $data = $password;
            if(!file_exists($filePathPasswords)){
                file_put_contents($filePathPasswords, $data);
            }else{
//               file_put_contents($filePathPasswords, $data, FILE_APPEND);
            }

            $contentDirs = ["video", "music", "photo"];

            foreach($contentDirs as $contentDir){
                $path = $nameDir . "/" . $contentDir;

                if(!file_exists($path)){
                    mkdir($path, 0777, true);
                    $filePath = $path . "/info.txt";
                    file_put_contents($filePath, "Цей файл для розділу " . $contentDir);
                }
            }
        }else{
            echo "Папка з такою назвою вже існує";
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
<a href="delete.php">Видалити логін</a>
</body>
</html>