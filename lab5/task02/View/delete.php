<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab5;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['id_to_delete']) && !empty($_POST['id_to_delete'])){
        $id = $_POST['id_to_delete'];
        if($result = $pdo->prepare("DELETE FROM tovar WHERE id = :id")){
            $result->bindValue(":id", $id, PDO::PARAM_INT);
            $result->execute();
            header('Location: ../index.php');
            exit();
        }
    }else{
        echo "Вкажіть коректний id для видалення ";
    }
    } catch (PDOException $e) {
    echo "Помилка Підключення: " . $e->getMessage();
}

?>
