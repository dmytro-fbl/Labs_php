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


echo "<br>Завдання 5<br>";
$circle = new Circle(3, 4, 5);
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


echo "<br>Завдання 6<br>";
$circle1 = new Circle(10, 18, 34);
echo "Перевірка першого кола з початковим: " . var_export($circle->isCrossing($circle1), true) . "<br>";

$circle2 = new Circle(2,2,2);
echo "Перевірка першого кола з початковим: " . var_export($circle->isCrossing($circle2), true) . "<br>";


echo "<br>Завдання 7<br>";

require 'Utils/FileOperations.php';
$files = [
    'file1.txt',
    'file2.txt',
    'file3.txt',
];
foreach ($files as $file) {
    echo "Зчитування з файлу $file<br>";
    echo FileOperations::readFile($file);
}

foreach ($files as $i => $file) {
    $someText = "Текст файлу з назвою $file<br>";
    FileOperations::writeFile($file, $someText);
    echo "Оновлений файл з записами: " . FileOperations::readFile($file);
}

foreach ($files as $i => $file){
    FileOperations::deleteFile($file);
    echo "<br>Очищений файл $file: " . FileOperations::readFile($file);
    $someText = "Привіт<br>";
    FileOperations::writeFile($file, $someText);
}
?>
