<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/forms.css">
    <title>Project</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="./../" class="header__logo">
                    <img src="./img/LOGO.png" alt="logo" class="header__logo-img">
                </a>

                <?php

                session_start();

                if (isset($_SESSION['user_id'])) {
                    echo "
                    <a href=\"./modules/profile.php\" class=\"headerBtn\" id=\"profileBtn\">
                    Профиль
                </a>
                    ";
                } else {
                    echo "
                    <div class=\"headerBtn\" id=\"loginBtn\">
                    Войти
                </div>
                    ";
                }

                ?>

            </div>
        </div>
    </header>


    <div class="registerForm modal hidden" id="registerForm">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form__title">Регистрация</div>
            <?php include("./modules/registerForm.php") ?>

            <div class="changeModal">Уже есть аккуант? <span id="loginBtn2">Войти</span></div>

        </div>
    </div>

    <div class="loginForm modal hidden" id="loginForm">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form__title">Авторизация</div>
            <?php include("./modules/loginForm.php") ?>
            <div class="changeModal">Нет аккаунта? <span id="registerBtn">Зарегистрироваться</span></div>
        </div>
    </div>

    <script>
        const loginModal = document.getElementById('loginForm');
        const registerModal = document.getElementById('registerForm');
        const loginBtn = document.getElementById("loginBtn");
        const loginBtn2 = document.getElementById("loginBtn2");
        const registerBtn = document.getElementById("registerBtn");
        const closeButtons = document.getElementsByClassName("close");

        loginBtn.onclick = function() {
            registerModal.classList.contains('block') ? registerModal.classList.replace('block', 'hidden') : 0;

            loginModal.classList.replace('hidden', 'block');
        };

        loginBtn2.onclick = function() {
            registerModal.classList.contains('block') ? registerModal.classList.replace('block', 'hidden') : 0;

            loginModal.classList.replace('hidden', 'block');
        };

        registerBtn.onclick = function() {
            loginModal.classList.contains('block') ? loginModal.classList.replace('block', 'hidden') : 0;

            registerModal.classList.replace('hidden', 'block');
        }

        for (let i = 0; i < closeButtons.length; i++) {
            closeButtons[i].onclick = function() {
                loginModal.classList.contains('block') ? loginModal.classList.replace('block', 'hidden') : 0;
                registerModal.classList.contains('block') ? registerModal.classList.replace('block', 'hidden') : 0;
            };
        }

        window.onclick = function(event) {
            if (event.target == loginModal) {
                loginModal.classList.replace('block', 'hidden');
            }

            if (event.target == registerModal) {
                registerModal.classList.replace('block', 'hidden');
            }
        };
    </script>