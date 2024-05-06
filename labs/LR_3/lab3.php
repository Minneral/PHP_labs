<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR_3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?PHP

    $a = 10;
    $b = 4;
    $c = $a % $b;
    $d = $a / $b;

    $e = ++$a;
    $f = $a++;

    $g = true;
    $k = "dfdfd";
    $h = "hello ".$k;
    echo($h);


    $z = 'b';
    $z1 = ' a';
    $z2 = "z";
    $z2 .= $z1;

    $bb = 15;
    $cc = 16;
    echo($b&$cc);

    $cc = $cc << 2;


    if("10" == 10)
        echo("10 = 10");

    if("10" === 10)
        echo("10 = 10");

    if("b" > "a")
        echo("b > a");



        $zero = 0;

        if($zero xor $a)
            echo("zero and a");

    ?>





</body>

</html>