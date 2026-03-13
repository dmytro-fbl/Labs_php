<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tovar";
    $result = $pdo->query($sql);

   include ('View/selectAll.php');


}catch (PDOException $e){
    echo $e->getMessage();
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
<a href="View/insert.php"><button >Стоврити запис</button></a><br><br>

<form action="View/delete.php" method="post">
    <input type="text" name="id_to_delete" placeholder="№ видалення" required>
    <button type="submit">Видалити запис</button>

</form>

</body>
</html>
