<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php

    // Таланков Иван Владимирович
    // Вариант 2

    // Utils
    {
        function output($str)
        {
            echo nl2br($str);
        }

        function pretty_open()
        {
            static $task_number = 1;
            output("<b>Задание {$task_number}</b>\n\n");
            $task_number++;
        }

        function pretty_close()
        {
            output("\n\n" . str_repeat('-', 200) . "\n\n\n");
        }
    }

    // 1
    {
        pretty_open();

        output("1) Ответ: POST\n");
        output("2) Ответ: В текущий исполняемый файл");

        pretty_close();
    }

    // 2
    {
        pretty_open();

        $people = [
            ['fio' => 'Иван', 'position' => 'Штукатурщик', 'experience' => 4],
            ['fio' => 'Валерия', 'position' => 'Медсестра', 'experience' => 2],
            ['fio' => 'Надежда', 'position' => 'Повар', 'experience' => 6],
            ['fio' => 'Виктория', 'position' => 'Швея', 'experience' => 2],
            ['fio' => 'Тунг Лам', 'position' => 'Слесарь', 'experience' => 5],
            ['fio' => 'Алина', 'position' => 'Кассир', 'experience' => 2]
        ];

        $most_exp_worker = $people[0];

        echo "<div class=\"list\">";

        foreach ($people as $item) {

            if ($item['experience'] > $most_exp_worker['experience']) {
                $most_exp_worker = $item;
            }

            echo "
        
        <div class=\"list__item\">
            <div class=\"name\">
                " . $item['fio'] . "
            </div>
    
            <div class=\"meta\">
                <div class=\"position\">
                " . $item['position'] . "
                </div>
                <div class=\"exp\">
                " . $item['experience'] . "
                </div>
            </div>
        </div>";
        }

        echo "</div>";

        output("\nДольше всего в компании работает " . $most_exp_worker['fio'] . ", его должность: " . $most_exp_worker['position']);

        pretty_close();
    }

    //3
    {
        pretty_open();

        echo "<form action=\"kr_3.php\" method=\"POST\">
        <input type=\"text\" name=\"email\">
        <input type=\"text\" name=\"password\">
    
        <button type=\"sumbit\" name=\"submit\">Отправить</button>
    </form>";

        pretty_close();
    }

    // 4
    {
        pretty_open();

        $connection = mysqli_connect('localhost', 'root', '', 'primer');

        $querry = "SELECT DISTINCT role.title_role, myUser.id, myUser.login, myUser.password FROM role, myUser WHERE role.id = myUser.id_role";

        $response = mysqli_query($connection, $querry);


        $amount_cols = mysqli_num_rows($response);

        echo "<div class=\"users\">";
        for ($i = 0; $i < $amount_cols; $i++) {

            $row = mysqli_fetch_assoc($response);

            echo "
    <div class=\"user\">
        <div class=\"id\">
            " . $row['id'] . "
        </div>

        <div class=\"role\">
        " . $row['title_role'] . "
        </div>

        <div class=\"login\">
        " . $row['login'] . "

        </div>

        <div class=\"password\">
        " . $row['password'] . "
            
        </div>
    </div>";
        }
        echo "</div>";

        pretty_close();
    }

    ?>

</body>



</html>