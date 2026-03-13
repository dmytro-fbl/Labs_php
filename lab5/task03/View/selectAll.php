<head>
    <style>
        tr, td, th{
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>

<h2>Список працівників</h2>

<table style="border: 1px solid black; border-collapse: collapse">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Позиція</th>
        <th>Зарплата</th>
    </tr>
    <?php
    $index = 1;
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $index . "</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['position'] . "</td>";
        echo "<td>" . $row['salary'] . " грн</td>";
        echo "<td><a href='View/update.php?id=" . $row['id'] . "'>Редагувати</a></td>";
        echo "<td><a href='View/delete.php?id=" . $row['id'] . "'>Видалити</a></td>";
        echo "</tr>";
        $index++;
    }
    ?>
</table>