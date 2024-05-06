<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TASK 6</title>
</head>

<body>

    <form action="task6_execute.php" method="post">

        <div class="form__item">
            <label>Email:</label>
            <input type="text" name="email">
        </div>

        <div class="form__item">
            <label>Message:</label>
            <textarea name="message" cols="30" rows="10"></textarea>
        </div>

        <input type="submit">
    </form>

    <div class="messages">
        <?php


        if (in_array('messages.txt', scandir(__DIR__))) {

            $file = fopen('messages.txt', 'r');

            if (!$file)
                return;

            while (feof($file) == false) {
                $str = fgets($file);

                if($str == '')
                    continue;

                list($mail, $date, $message) = explode(";", $str);

                echo
                "
            <div class=\"message\">
            <div class=\"message__info\">
                <div class=\"message__email\">
                    " . $mail . "
                </div>

                <div class=\"message__time\">
                    " . $date . "
                </div>
            </div>

            <div class=\"message__content\">
                " . $message . "
            </div>
        </div>
            ";
            }

            fclose($file);
        } else {
        }

        ?>

    </div>

    <a href="lab14.php" class="goback">Назад</a>

</body>

</html>