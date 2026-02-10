<?php
echo 'Завдання 2<br>';
echo "Полину в мріях в купель океану,<br>
        Відчую <b>шовковистість</b> глибини,<br>
        &nbsp;Чарівні мушлі з дна собі дістану,<br>
        &nbsp;&nbsp;&nbsp; Щоб <i><b>взимку</b></i> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>тішили</u><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; мене<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; вони...";

echo '<br><br>Завдання 3<br>';
$uan = 1500;
$usd = 43;
$result = round($uan/$usd);
echo "$uan грн. Можна обміняти на $result доларів";


echo '<br><br>Завдання 4<br>';
$numberMonth = (int)6;
if($numberMonth < 1 || $numberMonth > 12 || !is_int($numberMonth)) {
    echo 'Невірно вказане число місяця';
}else{
    if($numberMonth <= 2 || $numberMonth == 12){
        echo 'Winter';
    }else if($numberMonth > 2 && $numberMonth <= 5){
        echo 'Spring';
    }else if($numberMonth > 5 && $numberMonth <= 8){
        echo 'Summer';
    }else if($numberMonth > 8 && $numberMonth <= 11){
        echo 'Autumn';
    }
}


echo '<br><br>Завдання 5<br>';
$letter = 'и';
$letterToLower = mb_strtolower($letter, 'UTF-8');
if(!preg_match("/^[а-яіїєґ]$/u", $letterToLower)){
    echo "Це не літера";
}else{
    switch ($letterToLower){
        case 'а':
        case 'о':
        case 'у':
        case 'е':
        case 'ї':
        case 'і':
        case 'є':
        case 'я':
        case 'ю':
        case 'и':
            echo "Голосна літера: $letter";
            break;
        default:
            echo "Приголосна літера: $letter";
    }
}

echo '<br><br>Завдання 6<br>';

$randomNumber = mt_rand(100, 999);
$sum = 0;
$min = 0;
$newCountArray = [];
$newCount = '';
$maxCount = '';
echo "$randomNumber<br>";

for($i = 0; $i < 3; $i++){
    $remainder = $randomNumber % 10;
    if($remainder <= $min){
        $min = $remainder;
        $maxCount = $maxCount . $remainder;
    }
    else{
        $min = $remainder;
        $maxCount = $remainder . $maxCount;
    }
    $newNumber = ($randomNumber - $remainder) / 10;
    $randomNumber = $newNumber;
    $newCount .= $remainder;
    $newCountArray[$i] = $remainder;

    $sum += $remainder;
}
sort($newCountArray);
$maxCount = $newCountArray[2] . $newCountArray[1] . $newCountArray[0];
echo "Сума: $sum<br>";
echo "Число навпаки: $newCount<br>";
echo "Максимальне число: $maxCount";

echo '<br><br>Завдання 7<br>';

function table($rows, $cols){
    echo '<table border="1">';
    for($i = 0; $i < $rows; $i++){
        echo '<tr>';
        for($j = 0; $j < $cols; $j++){
            $r = mt_rand(0, 255);
            $g = mt_rand(0, 255);
            $b = mt_rand(0, 255);
            $color = "rgb($r, $g, $b)";
            echo "<td style='background-color:$color;width: 20px; height: 20px'></td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}
function square($n){

echo "<div style='position: relative; width: 1200px;
            height: 400px; background-color: black'>";
for($i = 0; $i < $n; $i++){
    $size = mt_rand(10, 50);
    $top = mt_rand(10, 350);
    $left = mt_rand(10, 80);
    echo "<div style='position: absolute;
 width: $size;
  height: $size;
   background-color: red;
   top: {$top}px;
   left: {$left}%;
   border: 1px solid black;'
   ></div>";
}
echo "</div>";




}

table(4,6);
square(4);
?>