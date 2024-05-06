<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR_2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?PHP

    $bool1 = true;

    if($bool1)
    {
        echo "Бул = Труе";
    }
    else
    {
        echo "Бул = Фалсе";
    }


    $int1 = 8;
    echo "Количество бит в одном байт: $int1";


    $float1 = 10 / 3;
    echo "Какое-то очень важное число: $float1";
    $floor = floor($float1);
    $ceil = ceil($float1);
    $float_to_int = intval($float1);

    echo "Потеряли точность: $floor";
    echo "Улетели в небо: $ceil";
    echo "Преобразовали в инт: $float_to_int";




    $message = "Строка";
    $message1 = 'Тоже строка';
    $message2  =    <<<TT
                    Ну это ктса тоже строка
                    TT;


    $array[0] = "Толик";
    $array[1] = "Тунг Лам";
    $array[2] = "Лам";

    $array1[] = "Ваня";
    $array1[] = "Иван";
    $array1[] = "Иван Владимирович";


    $array2[0][0] = "Два измерения";
    $array2[0][1] = "Страшно, вырубай";


    $array3['Толик'] = "Нгуен Тунг Лам";
    $array3['Ваня'] = "Таланков Иван Владимирович"

    ?>



</body>

</html>