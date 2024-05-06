<?php

session_start();
date_default_timezone_set('Europe/Moscow');

$_SESSION["messages"][] = ['name' => $_POST['name3'], 'time' => date("h:i"), 'mess' => $_POST["mess"]];
header("Location: ./lab10.php");
?>