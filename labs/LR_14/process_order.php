<?php

if (isset($_GET['order'])) {
    $orderInfo = $_GET['order'];

    $ordersFile = 'orders.txt';
    file_put_contents($ordersFile, $orderInfo, FILE_APPEND);
}

header("Location: task7.php");
