<?php

require "./db.php";

if($_POST['name'] && $_POST['price'])
{
    $category_index = intval($_POST['select_categories']);
    
    $products = mysqli_fetch_all(mysqli_query($link, "SELECT NAME FROM PRODUCTS"));

    var_dump($_POST);
    // foreach($products as $product)
    // {
    //     if($product[0] == $_POST['name'])
    //     {
    //         header("Location: ./products_page.php");
    //         return;
    //     }
    // }
    
    $sql = "INSERT INTO PRODUCTS (NAME, CATEGORY, PRICE) VALUES ('{$_POST['name']}', {$category_index}," . floatval($_POST['price']) .")";
    var_dump($sql);

    mysqli_query($link, $sql) or die("Ошибка ". mysqli_error($link));
}

header("Location: ./products_page.php");
