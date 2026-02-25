<?php
    if (isset($_POST['upload'])){
        $target_dir = "uploads/";
        if(!is_dir($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        $file = $_FILES['my_image'];
        $filename = basename($file["name"]);
        $targetFilePath = $target_dir . $filename;

        $filetype = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
        $allowTypes = array('jpg','jpeg','png','gif');

        if(in_array($filetype,$allowTypes)){
            if(move_uploaded_file($file["tmp_name"], $targetFilePath)){
                echo "Файл \n" . $filename . "\nУспішно завантажено\n";
                echo "<br><img alt='Завантажена картинка' src='$targetFilePath' width='200'>";
            }else{
                echo "Виникла помилка";
            }
        }else{
            echo "Невірний формат файлу";
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
<form action="" method="post" enctype="multipart/form-data">
    <label for="">Оберіть зображення<br></label>
    <input type="file" name="my_image" accept="image/*" required>
    <button type="submit" name="upload">Завантажити</button>
</form>
</body>
</html>