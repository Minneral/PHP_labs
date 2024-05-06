<?php

$email = $_POST['email'];
$message = $_POST['message'];
$time = date('H:i d.m.Y', time());

$file = fopen('messages.txt', 'a+');

fwrite($file, $email . ";" . $time . ";" . $message . "\n");

fclose($file);

Header("Location: task6.php");
