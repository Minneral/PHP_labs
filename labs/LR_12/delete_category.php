<?php

require "./db.php";

if($_POST['select_categories'])
{
    $categories = mysqli_fetch_all(mysqli_query($link, "SELECT CATEGORY FROM CATEGORIES"));
    
    mysqli_query($link, "DELETE FROM PRODUCTS WHERE CATEGORY = {$_POST['select_categories']}") or die("Ошибка ". mysqli_error($link));

    $sql = "DELETE FROM CATEGORIES WHERE ID = {$_POST['select_categories']}";
    mysqli_query($link, $sql) or die("Ошибка ". mysqli_error($link));
}

header("Location: ./lab12.php");
