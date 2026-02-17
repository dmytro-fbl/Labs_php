<?php
$output = "";
if(isset($_POST["newTextSubmit"])){
    $text = $_POST["text"] ?? "";
    $find = $_POST["find"] ?? "";
    $rename = $_POST["rename"] ?? "";
    $result = str_replace($find, $rename, $text);
    $output = "Новий рядок: " . $result;
}

function sortCites($citiesStr)
{
    $arr = explode(" ", $citiesStr);
    sort($arr, SORT_STRING | SORT_FLAG_CASE);
    return implode(" ", $arr);
}

if(isset($_POST["citiesSubmit"])){
    $citiesStr = $_POST["citiesStr"] ?? "";
    $result = sortCites($citiesStr);
    $output = "Відсортовані міста: " . $result;
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
<p><?= $output?> </p>
</body>
</html>
