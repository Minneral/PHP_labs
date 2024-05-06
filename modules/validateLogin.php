<?php

function clearString($str)
{
    $str = trim($str);
    $str = strip_tags($str);
    $str = stripslashes($str);
    return $str;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include('../config/db.php');
    include('../config/ecnrypto.php');

    $loginError = '';
    $passError = '';

    $login = clearString($_POST['login']);
    $pass = clearString($_POST['pass']);

    $tryLogin = true;

    try {
        # region: Login Validate

        $querry = $connection->prepare("SELECT * FROM USERS WHERE login=:login");
        $querry->bindParam('login', $login, PDO::PARAM_STR);
        $querry->execute();

        if (empty($login)) {
            $loginError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if ($querry->rowCount() == 0) {
            $loginError = 'Такой пользователь не зарегистрирован!';
            throw new Exception();
        }

        # endRegion


        # region: Password Validate

        $result = $querry->fetch(PDO::FETCH_ASSOC);



        if (empty($pass)) {
            $passError = 'Это поле не может быть пустым!';
            throw new Exception();
        } else if (!verify_password($pass, $result['password'], $result['salt'])) {
            $passError = 'Неверный пароль!';
            throw new Exception();
        }

        # endRegion

    } catch (Exception $e) {
        $tryLogin = false;
    }

    if ($tryLogin) {

        session_start();

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['user_login'] = $result['login'];
        $_SESSION['user_email'] = $result['email'];
        $_SESSION['user_phone'] = $result['phone'];
        $_SESSION['user_gender'] = $result['gender'];
        $_SESSION['user_avatar'] = $result['avatar'];
        $_SESSION['user_role'] = $result['role'];
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'loginError' => $loginError,  'passError' => $passError]);
    }

    //Header('Location: ' . $_SERVER['REQUEST_URI']);
}
