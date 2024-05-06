<?php
//Если передана капча
if (isset($_POST['captcha'])) {
    //Получаем введенную пользователем капчу
    $code = $_POST['captcha'];
    session_start();
    //Сравниваем
    if (isset($_SESSION['captcha']) && strtoupper($_SESSION['captcha']) == ($code))
        echo 'Правильно!';
    else
        echo 'Неправильно!';
    //Удаляем из сессии код капчи
    unset($_SESSION['captcha']);
    exit();
}
