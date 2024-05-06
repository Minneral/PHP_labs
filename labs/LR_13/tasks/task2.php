<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="task2.css">
    <title>Task2 | LR13</title>
</head>

<body>


    <form action="./task2_1.php" method="GET">
        <input style="display: none;" name="img" value="https://clipart-library.com/images/8TxrjbBXc.jpg">
        <img src="https://clipart-library.com/images/8TxrjbBXc.jpg" alt="img">

        <div class="form__options">
            <div class="form__option">
                <input type="radio" id="radio1" name="myradio" value="invert">
                <label for="radio1">Инвертировать цвета изображения</label>
            </div>

            <div class="form__option">
                <input type="radio" id="radio2" name="myradio" value="toGray">
                <label for="radio2">Преобразовать в градации серого</label>
            </div>


            <div class="form__option">
                <input type="radio" id="radio3" name="myradio" value="blur">
                <label for="radio3">Размыть</label>
            </div>


            <div class="form__option">
                <input type="radio" id="radio4" name="myradio" value="pixel">
                <label for="radio4">Пикселизировать</label>
            </div>


            <div class="form__option">
                <input type="radio" id="radio5" name="myradio" value="inc">
                <label for="radio5">Добавить рельеф</label>
            </div>


            <input type="submit" name="submit">
        </div>
    </form>

</body>

</html>