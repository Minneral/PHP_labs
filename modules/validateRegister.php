<?php

function clearString($str)
{
    $str = trim($str);
    $str = strip_tags($str);
    $str = stripslashes($str);
    return $str;
}

function printLog($success)
{
    $currentDate = date("d.m.y");
    $currentTime = date("H:i:s");
    $file = fopen('../logs/log.txt', 'a+');
    if ($success) {
        $log = "Регистрация прошла успешно (дата: $currentDate, время: $currentTime)\n";
    } else {
        $log = "Регистрация завершена ошибкой (дата: $currentDate, время: $currentTime)\n";
    }
    fwrite($file, $log);
    fclose($file);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include('../config/db.php');
    include('../config/ecnrypto.php');

    $nameError = '';
    $loginError = '';
    $emailError = '';
    $passError = '';
    $passConfirmError = '';
    $phoneError = '';
    $genderError = '';
    $captchaError = '';

    $name = clearString($_POST['name']);
    $login = clearString($_POST['login']);
    $email = clearString($_POST['email']);
    $pass = clearString($_POST['pass']);
    $passConfirm = clearString($_POST['passConfirm']);
    $phone = clearString($_POST['phone']);
    $gender = clearString($_POST['gender']);
    $captcha = clearString($_POST['captcha']);

    $register = true;

    try {
        # region: Name Validate

        if (empty($name)) {
            $nameError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if (!preg_match('/^[A-Za-zА-Яа-яЁё\s\-]+$/iu', $name)) {
            $nameError .= "Введенные ФИО не соответствует требованиям";
            throw new Exception();
        }


        # endRegion


        # region: Login Validate

        $querry = $connection->prepare("SELECT * FROM USERS WHERE login=:login");
        $querry->bindParam('login', $login, PDO::PARAM_STR);
        $querry->execute();

        if (empty($login)) {
            $loginError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if ($querry->rowCount() > 0) {
            $loginError = 'Такой пользователь уже зарегистрирован!';
            throw new Exception();
        } else if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $login)) {
            $loginError = "Введенный логин не соответствует требованиям";
            throw new Exception();
        }

        # endRegion


        # region: Email Validate

        if (empty($email)) {
            $emailError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
            $emailError = "Введенный Email не соответствует требованиям";
            throw new Exception();
        }

        # endRegion


        # region: Password Validate

        if (empty($pass)) {
            $passError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if ($pass != $passConfirm) {
            $passConfirmError = 'Пароли не совпадают!';
            throw new Exception();
        }

        # endRegion



        # region: Phone Validate

        if (empty($phone)) {
            $phoneError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if (!preg_match('/^\+\d{1,3}\s?\d{1,4}\s?\d{1,10}$/', $phone)) {
            $phoneError = "Введенный номер телефона не соответствует требованиям";
            throw new Exception();
        }

        # endRegion

        # region: Gender Validate

        session_start();

        if (empty($gender)) {
            $genderError = 'Это поле не может быть пустым!';
            throw new Exception();
        }

        # endRegion



        # region: Captcha Validate

        session_start();

        if (empty($captcha)) {
            $captchaError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if ($_SESSION['captcha'] != $captcha) {
            $captchaError = 'Неправильно введена капча!';
            throw new Exception();
        }

        # endRegion



    } catch (Exception $e) {
        $register = false;
    }

    printLog($register);

    if ($register) {
        $userSalt = generate_salt();
        $hashPass = hash_password($pass, $userSalt);

        try {

            $querry = $connection->prepare("INSERT INTO USERS(name, login, email, password, phone, gender, avatar, salt, role) VALUES(:name,:login,:email,:password,:phone,:gender,:avatar,:salt,:role)");

            $querry->bindParam('name', $name, PDO::PARAM_STR);
            $querry->bindParam('login', $login, PDO::PARAM_STR);
            $querry->bindParam('email', $email, PDO::PARAM_STR);
            $querry->bindParam('password', $hashPass, PDO::PARAM_STR);
            $querry->bindParam('phone', $phone, PDO::PARAM_STR);
            $querry->bindParam('gender', $gender, PDO::PARAM_STR);
            $querry->bindParam('salt', $userSalt, PDO::PARAM_STR);
            $querry->bindValue('avatar', NULL, PDO::PARAM_NULL);
            $querry->bindValue('role', 'user', PDO::PARAM_STR);

            $querry->execute();
        } catch (PDOException $e) {
        }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'nameError' => $nameError, 'loginError' => $loginError, 'emailError' => $emailError, 'passError' => $passError, 'passConfirmError' => $passConfirmError, 'phoneError' => $phoneError, 'genderError' => $genderError, 'captchaError' => $captchaError]);
    }
}
