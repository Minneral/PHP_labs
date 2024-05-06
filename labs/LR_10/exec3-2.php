<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exec3-2.css">
    <title>Messages</title>
</head>

<body>
    <div class="container">
        <div class="messages">
            <?php
            session_start();
            $messages = $_SESSION["messages"];

            if (empty($_SESSION["messages"]))
                echo "<h1>Нет сообщений</h1>";
            else {
                foreach ($messages as $message) {
                    echo "<div class=\"message\">
                <div class=\"message__meta\">
                    <div class=\"message__name\">Автор: " . $message['name'] . "</div>
                    <div class=\"message__time\">Время: " . $message['time'] . "</div>
                    <form action=\"./exec3-2-1.php\" method=\"POST\">
                    <input type=\"submit\" name=\"" . array_search($message, $_SESSION["messages"]) . "\" value=\"Удалить\">
                </form>
                </div>
                <div class=\"message__info\">
                    Сообщение: " . $message['mess'] . "
                </div>
            </div>";
                }
            }

            ?>
        </div>
        <a href="./lab10.php">На главную</a>
    </div>
</body>

</html>