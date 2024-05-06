<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>LR_9 #2</title>
</head>

<body>
    <div class="wrap">
        <?php
        session_start();
        include "../modules/header.php";
        ?>

        <main class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="main__title">
                        <?php echo $_SESSION["fio"] ?>
                    </div>

                    <div class="main__task">
                        <div class="main__task-title">
                            <span>Условие:</span> Написать функцию с переменным числом параметров, которая находит сумму чисел типа int по формуле: S=a1*a2+a2*a3+a3*a4+. . . . .
                        </div>
                        <div class="main__task-solution">
                            <?php
                            function func4()
                            {
                                $sum = 0;
                                for ($i = 0; $i < func_num_args() - 1; $i++) {
                                    $sum += func_get_arg($i) * func_get_arg($i + 1);
                                }

                                return $sum;
                            }

                            echo nl2br("Переданные параметры: [1, 2, 3, 4, 5, 6, 7, 8]\nРезульатат: " . func4(1, 2, 3, 4, 5, 6, 7, 8));
                            ?>
                        </div>
                    </div>

                    <a class="main__back" href="../lab9.php">
                        На главную
                    </a>
                </div>
            </div>
        </main>

        <?php
        include "../modules/footer.php";
        ?>
    </div>
</body>

</html>