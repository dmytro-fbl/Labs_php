<?php
require_once('Utils/autoload.php');

use Controllers\UserController;
use Models\Circle;
use Views\UserView;
use Models\UserModel;

$userController = new UserController();
$userView = new UserView();
$userModel = new UserModel();


echo "Завдання 1-4<br>";
$userController->printController();
$userView->printView();
$userModel->printModel();

//5
$circle = new Circle(3, 4, 5);

echo "<br>Завдання 5<br>";
echo "<br>" . "Координата Х: " . $circle->getCoordX() . "<br>";
echo "Координата Y: " . $circle->getCoordY() . "<br>";
echo "Радіус: " . $circle->getRadius() . "<br>";
echo $circle->__toString();

$circle->setCoordX(10);
$circle->setCoordY(16);
$circle->setRadius(10);

echo "Нова Координата Х: " . $circle->getCoordX() . "<br>";
echo "Нова Координата Y: " . $circle->getCoordY() . "<br>";
echo "Новий Радіус: " . $circle->getRadius() . "<br>";

echo $circle->__toString();


?>
