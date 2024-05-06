<?php

require "./db.php";

var_dump($_POST);
if($_POST['new_category'])
{
    $categories = mysqli_fetch_all(mysqli_query($link, "SELECT CATEGORY FROM CATEGORIES"));

    $sql = "UPDATE CATEGORIES SET CATEGORY = '{$_POST['new_category']}' WHERE ID = '{$_POST['select_categories']}'";
    mysqli_query($link, $sql) or die("Ошибка ". mysqli_error($link));
}

header("Location: ./lab12.php");
