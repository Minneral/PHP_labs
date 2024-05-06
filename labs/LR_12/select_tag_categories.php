<?php

require "./db.php";

$sql = "SELECT * FROM CATEGORIES";
$response = mysqli_query($link, $sql);

echo "<select name=\"select_categories\">";

{
    if(mysqli_num_rows($response))
    {
        $rows_amount = mysqli_num_rows($response);

        for($i = 0; $i < $rows_amount; $i++)
        {
            $row = mysqli_fetch_assoc($response);

            echo "<option value=". $row['ID'] . ">" . $row['CATEGORY'] . "</option>";
        }
    }
}

echo "</select>";