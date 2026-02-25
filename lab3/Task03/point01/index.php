<?php
    if(isset($_POST['submitComments'])){
        $firstName = $_POST['firstName'];
        $comment = $_POST['comment'];
        $row = $firstName . "|" . $comment . "\n";
        $file = fopen("comments.txt", "a");
        fwrite($file, $row);
        fclose($file);


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
    <label for="firstName">Ім'я</label>
    <input type="text" name="firstName" required>
    <label for="comment">Коментар</label>
    <input type="text" name="comment" required>
    <input type="submit" name="submitComments" value="Надіслати">
</form>
<?php
if(file_exists("comments.txt")) {
    $file = fopen("comments.txt", "r");
    while (($line = fgets($file)) !== false) {
        $data = explode("|", trim($line));
        if(count($data) == 2) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data[0]). "<br></td>";
            echo "<td>" . htmlspecialchars($data[1])  . "<br></td>";
            echo "</tr>";
        }
    }
    fclose($file);
}else {
    echo "<tr><td colspan='2'>Коментарів ще немає</td></tr>";
}
?>
</body>
</html>