<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛР_1</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <?php
    echo 'Я скрипт!'; // коммент
    /*Я тоже коммент
            Да */
    # Я тоже
    ?>


    <p style="color: red">
        <?php
        echo 'А скрипт магёт';
        ?>
    </p>

    <?PHP
    echo '<p align=\'center\'>';
    echo "Hello!!!";
    echo "</p>";
    ?>


    <p align="center">
        <span style="color: red; font-size: 2em">
            <?PHP
                echo "Hello!!!";
            ?>
        </span>
    <p>
        <hr>
        <br>
    <p align="center">
        <span style="color: green; font-size: 3em">
            <?PHP
            echo "Hello!!!";
            ?>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <?PHP
                echo "Hello!!!";
            ?>
        </span>
    <p>
        <hr>
        <br>
    <p align="center">
        <span style="color: blue; font-size: 2em">
            <?PHP
                $message = 'myMessage';
                echo $message;
            ?>
        </span>
    <p>

</body>

</html>