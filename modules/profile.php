<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Личный кабинет</title>
</head>

<?php

include('header.php');

echo "
<script>
document.getElementsByClassName('header__logo-img')[0].src = \"../img/LOGO.png\";
document.getElementById('profileBtn').href = \"./profile.php\";
</script>
";
?>

<body>
    <main class="main">
        <div class="container">
            <h1 class="title">Личный кабинет</h1>
            <div class="main__inner">
                <div class="main__info">

                    <?php

                    session_start();

                    if (isset($_SESSION['user_id']) == false) {
                        echo "<h1>Неизвестный пользователь!</h1>";
                        return;
                    }

                    echo "<div class=\"main__info-item\">
                    <span>ФИО:</span>" . $_SESSION['user_name'] . "
                    </div>";

                    echo "<div class=\"main__info-item\">
                    <span>Логин:</span>" . $_SESSION['user_login'] . "
                    </div>";

                    echo "<div class=\"main__info-item\">
                    <span>Email:</span>" . $_SESSION['user_email'] . "
                    </div>";

                    echo "<div class=\"main__info-item\">
                    <span>Телефон:</span>" . $_SESSION['user_phone'] . "
                    </div>";

                    echo "<div class=\"main__info-item main__info-item_avatar\">
                    
                    <div class=\"main__info-title\">
                    Аватар:
                    </div>
                    ";



                    if ($_SESSION['user_avatar'] != null) {
                        echo "<img src='getAvatar.php' class=\"avatar\">";
                    } else {
                        echo "<img src='https://avatars.mds.yandex.net/i?id=32c2b34df811140743dee41a4ebb793efcab46f1-10878007-images-thumbs&n=13' class=\"avatar\">";
                    }
                    echo "</div>";


                    ?>
                </div>

                <div class="main__actions">
                    <form method="POST" id="exitForm">
                    <h4 class="main__title">Выйти из аккаунта:</h4>

                        <input type="hidden" name="exit">
                        <button type="submit">Выйти</button>
                    </form>

                    <form method="POST" enctype="multipart/form-data" id="updateImgForm">
                        <h4 class="main__title">Изменить аватар:</h4>

                        <input type="file" name="file" accept="image/*">
                        <button type="submit" name="upd_avatar" id="loadImg">Загрузить</button>
                    </form>
                </div>



            </div>
        </div>
    </main>


    <script>
        $(document).ready(function() {
            $('#updateImgForm').submit(function(event) {
                event.preventDefault();

                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: 'POST',
                    url: './updateAvatar.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        window.location.reload();
                    }
                });
            });

            $('#exitForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: './exit.php',
                    data: formData,
                    success: function(response) {
                        window.location.href = "/..";
                    },
                    error: function(xhr, status, error) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

<?php include('./footer.php')?>
</body>

</html>