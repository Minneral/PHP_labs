<?php

require "./db.php";

$sql = "SELECT * FROM CATEGORIES";
$response = mysqli_query($link, $sql);

echo "<ul class=\"mt-100\">";

{
    if(mysqli_num_rows($response) == 0)
    {
        echo "<h2 class=\"title\">Категории пусты!</h2>";
    }
    else
    {
        echo "<h2 class=\"title\">Список категорий:</h2>";

        $rows_amount = mysqli_num_rows($response);

        for($i = 0; $i < $rows_amount; $i++)
        {
            $row = mysqli_fetch_assoc($response);

            echo "<li>" . $row['CATEGORY'] . "</li>";
        }
    }
}

echo "</ul>";