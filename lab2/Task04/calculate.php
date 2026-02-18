<?php
require "Function/func.php";


    $numberX = $_POST["numberX"] ?? 0;
    $numberY = $_POST["numberY"] ?? 0;
    $sinX = sinCalc($numberX);
    $cosX = cosCalc($numberX);
    $tgX = tgCalc($numberX);
    $myTan = my_tgX($numberX);
    $powXToY = powCalc($numberX, $numberY);
    $factXToY = factorialCalc($numberX);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>x^y</th>
        <th>x!</th>
        <th>my_tg(x)</th>
        <th>sin(x)</th>
        <th>cos(x)</th>
        <th>tg(x)</th>
    </tr>
    <tr>
        <td><?= htmlspecialchars($powXToY) ?></td>
        <td><?= htmlspecialchars($factXToY) ?></td>
        <td><?= htmlspecialchars($myTan) ?></td>
        <td><?= htmlspecialchars($sinX) ?></td>
        <td><?= htmlspecialchars($cosX) ?></td>
        <td><?= htmlspecialchars($tgX) ?></td>
    </tr>
</table>

<br>
<a href="index.php">Назад до форми</a>
</body>
</html>
