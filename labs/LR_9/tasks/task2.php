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
                            <span>Условие:</span> Напишите функцию, которая принимает параметром число от 1 до 7 и флаг языка (rus / eng), а возвращает день недели на русском / английском языках.
                        </div>
                        <div class="main__task-solution">
                            <?php
                            function func2($digit, $lang)
                            {
                                $values = [];
                                $vocabulary = array(
                                    "monday" => "понедельник",
                                    "tuesday" => "вторник",
                                    "wednesday" => "среда",
                                    "thursday" => "четверг",
                                    "friday" => "пятница",
                                    "saturday" => "суббота",
                                    "sunday" => "воскресенье"
                                );

                                switch ($lang) {
                                    case "rus":
                                        $values = array_values($vocabulary);
                                        break;
                                    case "eng":
                                        $values = array_keys($vocabulary);
                                        break;
                                    default:
                                        echo nl2br("Неизвестный язык!");
                                        break;
                                }

                                if ($values)
                                    echo ("Результат: " . $values[$digit - 1]);
                            }

                            func2(3, "eng");
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