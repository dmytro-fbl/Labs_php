<head>
    <style>
        tr, td, th{
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>

<h2>Список товарів</h2>

<table style="border: 1px solid black; border-collapse: collapse">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Назва</th>
        <th>Ціна</th>
        <th>Кількість</th>
        <th>Дата</th>
    </tr>
    <?php
    $index = 1;
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $index . "</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['cost'] . " грн</td>";
        echo "<td>" . $row['amount'] . " шт</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
        $index++;
    }
    ?>
</table>

