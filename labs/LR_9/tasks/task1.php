<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>LR_9 #1</title>
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
                            <span>Условие:</span> Напишите пользовательскую функцию, которая принимает два параметра – число и разделитель, например, (9, -) и с помощью цикла for формирует строку вида -1-2-3-4-5-6-7-8-9-.
                        </div>
                        <div class="main__task-solution">
                            <?php
                            function func1($digit, $separator)
                            {
                                if (is_int($digit) == false)
                                    return "Error";

                                $result = "";

                                for ($i = 1; $i <= $digit; $i++) {
                                    $result .= "{$separator}{$i}";
                                }

                                return $result . $separator;
                            }

                            echo ("Результат: " . func1(8, "-"));
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