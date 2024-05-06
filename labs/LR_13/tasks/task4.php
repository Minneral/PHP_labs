<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR13 | 4</title>
</head>

<body>
    <form action="check.php" method="post">
        <div class="img" style="width: 200px; height: 60px; object-fit: contain;">
            <img src='captcha.php' id='capcha-image'>
        </div>
        <br>&emsp;&emsp;
        <a href="" onclick="document.getElementById('capchaimage').src='captcha.php?rid=' + Math.random();">Обновить капчу</a>
        <br>
        <br>&nbsp;
        <input type="text" name="captcha" /><br />
        <br>&emsp;&emsp;&emsp;
        <input type="submit" value="Проверить" />
    </form>
</body>

</html>