<?php

require "./db.php";

if($_POST['category'])
{
    $categories = mysqli_fetch_all(mysqli_query($link, "SELECT CATEGORY FROM CATEGORIES"));

    var_dump($categories);
    var_dump($_POST);
    foreach($categories as $category)
    {
        if($category[0] == $_POST['category'])
        {
            header("Location: ./lab12.php");
            return;
        }
    }
    
    $sql = "INSERT INTO CATEGORIES (CATEGORY) VALUES ('{$_POST['category']}')";
    mysqli_query($link, $sql) or die("Ошибка ". mysqli_error($link));
}

header("Location: ./lab12.php");
