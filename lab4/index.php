<?php
require_once('Utils/autoload.php');

use Controllers\UserController;
use Models\Circle;
use Models\Human;
use Models\Programmer;
use Models\Student;
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

echo "<br><br>Завдання 8<br>";


$student = new Student(180, 70, 16, 'Житомирська політехніка', 3);
$programmer = new Programmer(176, 65, 20, ['C++', 'C#'], 4);

//$human = new Human(167, 60, 18);
//echo 'Людина1<br>';
//echo 'Зріст: ' . $human->getHeight() . "<br>";
//echo 'Вага: ' . $human->getWeight() . "<br>";
//echo 'Вік: ' . $human->getAge() . "<br>";
//
//$human->setHeight(190);
//$human->setWeight(90);
//$human->setAge(30);
//
//echo '<br>Людина2<br>';
//echo 'Зріст: ' . $human->getHeight() . "<br>";
//echo 'Вага: ' . $human->getWeight() . "<br>";
//echo 'Вік: ' . $human->getAge() . "<br>";

echo 'Студент1<br>';
echo 'Зріст: ' . $student->getHeight() . "<br>";
echo 'Вага: ' . $student->getWeight() . "<br>";
echo 'Вік: ' . $student->getAge() . "<br>";
echo ' Курс: ' . $student->getCourse() . "<br>";
echo 'Вищий навчальний заклад: ' . $student->getVNZ() . "<br>";

$student->setHeight(180);
$student->setWeight(73);
$student->setAge(56);
$student->setCourse(1);
$student->setVNZ('Поліський');

echo '<br>Студент2<br>';
echo 'Зріст: ' . $student->getHeight() . "<br>";
echo 'Вага: ' . $student->getWeight() . "<br>";
echo 'Вік: ' . $student->getAge() . "<br>";
echo 'Курс: ' . $student->getCourse() . "<br>";
echo 'Вищий навчальний заклад: ' . $student->getVNZ() . "<br>";

$student->upCourse();
echo 'Збільшення курсу: ' . $student->getCourse() . "<br>";

echo '<br>Програміст1<br>';
echo 'Зріст: ' . $programmer->getHeight() . "<br>";
echo 'Вага: ' . $programmer->getWeight() . "<br>";
echo 'Вік: ' . $programmer->getAge() . "<br>";
echo 'Вивчені мови програмування: ';
foreach ($programmer->getArrLanguage() as $lang) {
    echo $lang . " ";
}
echo '<br>Досвід роботи: ' . $programmer->getExperience() . '<br>';

$programmer->setHeight(169);
$programmer->setWeight(67);
$programmer->setAge(37);
$programmer->setExperience(8);
$programmer->setArrLanguage(['python', 'javascript']);

echo '<br>Програміст2<br>';
echo 'Зріст: ' . $programmer->getHeight() . "<br>";
echo 'Вага: ' . $programmer->getWeight() . "<br>";
echo 'Вік: ' . $programmer->getAge() . "<br>";
echo 'Вивчені мови програмування: ';
foreach ($programmer->getArrLanguage() as $lang) {
    echo $lang . " ";
}
echo '<br>Досвід роботи: ' . $programmer->getExperience() . '<br>';
$programmer->addLanguage('Go');

foreach ($programmer->getArrLanguage() as $lang) {
    echo $lang . " ";
}

echo '<br>' . $student->birthChild() . '<br>';
echo '<br>' . $programmer->birthChild() . '<br>';
?>
