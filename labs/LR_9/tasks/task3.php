<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>LR_9 #3</title>
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
                            <span>Условие:</span> Написать пользовательскую функцию, которая первое число увеличивает на единицу, а второе число уменьшает на три.
                            Сделать так, чтобы функция имела возможность изменять значение аргументов глобально.
                        </div>
                        <div class="main__task-solution">
                            <?php
                            function func3_1(&$param1, &$param2)
                            {
                                $param1++;
                                $param2 -= 3;
                            }

                            function func3_2($var_name1, $var_name2)
                            {
                                $GLOBALS[$var_name1]++;
                                $GLOBALS[$var_name2] -= 3;
                            }

                            $a = $b = 9;

                            echo nl2br("a = {$a}\nb = {$b}\n\nЗначения после выполнения функции:\n");

                            // func3_1($a, $b);
                            // echo nl2br("a = {$a}\nb = {$b}");

                            func3_2("a", "b");
                            echo nl2br("a = {$a}\nb = {$b}");
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


