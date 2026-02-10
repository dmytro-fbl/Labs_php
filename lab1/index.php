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

?>