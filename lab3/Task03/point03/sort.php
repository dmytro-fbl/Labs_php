<?php
$fileName = 'words.txt';
if (file_exists($fileName)) {
    $contents = file_get_contents($fileName);
    $wordsArray = array_filter(explode(" ", $contents));
    usort($wordsArray, function($a, $b) {
        return mb_strtolower($a) <=> mb_strtolower($b);
    });
    $sortedContents = implode(" ", $wordsArray);
    file_put_contents($fileName, $sortedContents);
    echo "Слова у файлі $fileName успішно відсортовані";
    echo "<h3>Результат сортування:</h3>";
    echo $sortedContents;
}else{
    echo "Помилка, файл не знайдено";
}
?>
<!--слово вона воно він алфавіт коза привіт приклад Дмитро   собака ти я-->