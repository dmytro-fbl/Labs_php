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
            echo 'Голосна літера';
            break;
        default:
            echo "Приголосна літера";
    }
}

echo '<br><br>Завдання 6<br>';



?>