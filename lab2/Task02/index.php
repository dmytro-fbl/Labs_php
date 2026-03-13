<?php
//2.1
function replayElement(array $array)
{
    $counts = array_count_values($array);
    $duplicates = [];
    foreach ($counts as $value => $count) {
        if ($count > 1) {
            $duplicates[] = $value;
        }
    }
    return $duplicates;
}

echo "<h2>Завдання 2.1</h2>";
$myArray = [1, 2, 3, 1, 4, 5, 2, 6, 7];
$duplicateNum = replayElement($myArray);
foreach ($myArray as $value) {
    echo $value;
}
echo "<br>Елементи що повторюються: " . implode(", ", $duplicateNum);


//2.2
function generateName(array $arraySyllables, $length = 3)
{
    $name = "";
    for ($i = 0; $i <$length; $i++) {
        $rand = random_int(0, count($arraySyllables) - 1);
        $name .= $arraySyllables[$rand];
    }
    return mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
}

echo "<h2>Завдання 2.2</h2>";

$syllables = ["ре", "му", "кс", "ла", "ба", "ал"];
$nameCat = generateName($syllables, 5);
$nameDog = generateName($syllables, 3);
echo "Ім'я собаки: <p>$nameDog</p>";
echo "Ім'я кота: <p>$nameCat</p>";

//2.3

function createArray()
{
    $size = random_int(3,7);

    $array = [];
    for ($i = 0; $i < $size; $i++) {
        array_push($array, random_int(10, 20));
    }
    return $array;
}

function AddTwoArray(array $array1, array $array2)
{
    $twoInOne = array_merge($array1, $array2);
    $uniqueArray = array_unique($twoInOne);
    sort($uniqueArray);
    return $uniqueArray;
}

$firstArray = createArray();

$secondArray = createArray();

$result = AddTwoArray($firstArray, $secondArray);
echo "<h2>Завдання 2.3</h2>";
echo "перший масив: " . implode(", ", $firstArray) . "<br>";
echo "другий масив: " . implode(", ", $secondArray) . "<br>";
echo "Фінальний масив: " . implode(", ", $result);


//2.4
$users =[
    "Dima" => 18,
    "Andrii" => 19,
    "Tymur" => 20,
    "Sviat" => 16,
];
function sortArray(array $array, $param)
{
    if($param === "age"){
        asort($array);
    }elseif ($param === "name"){
        ksort($array);
    }
    return $array;
}

echo "<h2>Завдання 2.4</h2>";
echo "Сортування за іменем:<br>";
$byName = sortArray($users, "name");
foreach ($byName as $key => $value) {
    echo "$key ($value),";
}

echo "<br>Сортування за віком:<br>";
$byAge = sortArray($users, "age");
foreach ($byAge as $key => $value) {
    echo "$key ($value), ";
}

?>
