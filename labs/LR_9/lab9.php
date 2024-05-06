<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LR_9</title>
</head>

<body>
    <div class="wrap">
        <?php
        include "./modules/header.php";

        session_start();
        $_SESSION["fio"] = "Таланков Иван Владимирович";

        if (isset($_POST["submit"])) {
            include "./destroy.php";
        }

        var_dump($_POST);
        ?>

        <main class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="main__title">
                        <?php echo $_SESSION["fio"] ?>
                    </div>

                    <div class="main__nav">
                        <a href="./tasks/task1.php" class="main__nav-item">
                            Задание 1
                        </a>

                        <a href="./tasks/task2.php" class="main__nav-item">
                            Задание 2
                        </a>

                        <a href="./tasks/task3.php" class="main__nav-item">
                            Задание 3
                        </a>

                        <a href="./tasks/task4.php" class="main__nav-item">
                            Задание 4
                        </a>

                        <form class="main__nav-item form" method="POST">
                            <input type="submit" name="submit" class="input" value="Удалить сессию">
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php
        include "./modules/footer.php";
        ?>
    </div>
</body>

</html>