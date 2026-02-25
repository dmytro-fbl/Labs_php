<?php
    $getFile1 = file_get_contents('file1.txt');
    $getFile2 = file_get_contents('file2.txt');

    $arrayFile1 = explode(" ", $getFile1);
    $arrayFile2 = explode(" ", $getFile2);

    $uniqueArrayInFile1 = array_diff($arrayFile1, $arrayFile2);
    $sameValues = array_intersect($arrayFile1, $arrayFile2);
    $twoInOneArray = array_merge($arrayFile1, $arrayFile2);
    $arrayCountValues = array_count_values($twoInOneArray);

    $content1 = implode(" ", $uniqueArrayInFile1);
    file_put_contents('newFile1.txt', $content1);

    $content2 = implode(" ", $sameValues);
    file_put_contents('newFile2.txt', $content2);

    $moreThanTwo = [];
    foreach ($arrayCountValues as $word => $count) {
        if ($count > 2){
            $moreThanTwo[] = $word ." " . $count;
        }
    }
    $content3 = implode(" ", $moreThanTwo);
    file_put_contents('newFile3.txt', $content3);

    if(isset($_POST['delete_file'])){
        $deleteFileName = $_POST['fileName_to_del'];
        if (file_exists($deleteFileName)) {
            unlink(__DIR__ . '/' . $deleteFileName);
            echo "Файл $deleteFileName видалено";
        }else{
            echo "Даного файлу немає";
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
    <label for="file">Виберіть файл для видалення</label>
    <input type="text" name="fileName_to_del" placeholder="ім'я.txt" required>
    <input type="submit" name="delete_file" value="Видалити">
</form>

</body>
</html>
