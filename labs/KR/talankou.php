<?php
// Таланков Иван Владимирович 25.06.2004
// Вариант 8
// 1
{
    echo nl2br("Задание 1:\n\n");

    echo nl2br("Правильные номера: a, b, c");

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 2
{
    echo nl2br("Задание 2:\n\n");

    $var1 = 5 * (25 + 6);
    $var2 = decbin($var1);
    $var3 = decoct($var1);
    $var4 = dechex($var1);

    echo nl2br("10-я сист: {$var1}\n16-я сист: {$var4}\n8-я сист: {$var3}\n2-я сист: {$var2}");

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 3
{
    echo nl2br("Задание 3:\n\n");

    echo nl2br("639 % 10 = " . 639 % 10);
    echo nl2br("\n3 % 10 = " . 3 % 10);

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 4
{
    echo nl2br("Задание 4:\n\n");

    $n = 25;
    $n = $n >> 1;
    echo nl2br("n / 2 = " . $n);

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 5
const myConst1 = 11;
define('myConst2', 11);
{
    echo nl2br("Задание 5:\n\n");

    echo nl2br("Const1: " . myConst1 . "\nConst2: " . myConst2);


    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 6
{
    echo nl2br("Задание 6:\n\n");

    $x = rand(1, 25);
    $a = rand(1, 25);
    $b = rand(1, 25);
    $c = rand(1, 25);

    $r = (sin(M_2_PI) + 2*$a + 3*$c) * cos(M_PI);
    $r /= ($a**2 + $b**2)*(1+$a**$x);

    echo nl2br("x = {$x}\na = {$a}\nb= {$b}\nc = {$c}\n\n R = {$r}");

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 7
{
    echo nl2br("Задание 7:\n\n");

    $str = "SomeTextHere";
    $n = rand(4, (int)(mb_strlen($str) / 2));

    $str1 = substr($str, 0, $n);
    $str2 = substr($str, $n);

    echo nl2br("Str: {$str}\nStr1: {$str1}\nStr2: {$str2}\n");

    $c = strtoupper(chr(ord($str[0]) + ord($str[-1])));
    $str1 = substr($str1, 0, strlen($str1) - 3) . str_repeat($c, 3);

    $str2 = strtr($str2, 'aeuio', '!!!!!');

    echo nl2br("New Str1: {$str1}");
    echo nl2br("\nNew Str2: {$str2}");


    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 8
{
    echo nl2br("Задание 8:\n\n");

    $arr1 = [10, 20, 30, 40, 50];
    $arr2 = [22, 33, 44, 77, 55, 88, 344];

    $arr3[] = min($arr1);
    $arr3[] = min($arr2);
    $arr3[] = max($arr1);
    $arr3[] = max($arr2);

    echo nl2br("Arr1: ");
    var_dump($arr1);
    echo nl2br("\nArr2: ");
    var_dump($arr2);
    echo nl2br("\nArr3: ");
    var_dump($arr3);

    $arr3[1] = 'Д';
    $arr3[4] = 'А';
    sort($arr3);
    $arr3_1_4 = implode(', ', array_slice($arr3, 0, 4));
    $sum = array_sum(array_slice($arr3, 0, 3));

    echo nl2br("\nArr3 после замен и сортировки:");
    var_dump($arr3);
    echo nl2br("\nПервые 4 элемента: " . $arr3_1_4);
    echo nl2br("\nСумма первых трех: " . $sum );

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 9
{
    echo nl2br("Задание 9:\n\n");

    $range = range(10, 50);
    shuffle($range);
    $arr = array_slice($range, 0, 6);

    $max1 = max($arr);
    $min1 = min($arr);
    $min2 = min(array_diff($arr, [$min1]));
    $min3 = min(array_diff($arr, [$min1, $min2]));

    $sum = $max1 + $min3;

    echo nl2br("Arr: " . implode(', ', $arr) . "\nMax: {$max1}\nMin3: {$min3}\nSum: {$sum}");

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}

// 10
{
    echo nl2br("Задание 10:\n\n");

    $range = range(100, 500);

    shuffle($range);
    $table[] = array_merge(["Таланков"], array_slice($range, 0, 12));

    shuffle($range);
    $table[] = array_merge(["Нгуен"], array_slice($range, 0, 12));

    shuffle($range);
    $table[] = array_merge(["Геско"], array_slice($range, 0, 12));

    shuffle($range);
    $table[] = array_merge(["Шимко"], array_slice($range, 0, 12));


    $may = [];
    $december = [];
    $november = [];
    $february = [];

    function getDecemberColumn($item)
    {
        global $december;
        $december[] = $item[12];
    }
    function getFebruaryColumn($item)
    {
        global $february;
        $february[] = $item[2];
    }
    function getNovemberColumn($item)
    {
        global $november;
        $november[] = $item[11];
    }
    function getMayColumn($item)
    {
        global $may;
        $may[] = $item[5];
    }

    array_map('getDecemberColumn', $table);
    array_map('getFebruaryColumn', $table);
    array_map('getNovemberColumn', $table);
    array_map('getMayColumn', $table);

    $max_may_index = array_search(max($may), $may);
    $max_february_index = array_search(max($february), $february);
    $sum_november = array_sum($november);
    $sum_december = array_sum($december);

    echo nl2br("Максимальный налог в Мае у: {$table[$max_may_index][0]}");
    echo nl2br("\nМаксимальный налог в Феврале у: {$table[$max_february_index][0]}");
    echo nl2br("\nСумма налога в Ноябре: {$sum_november}");
    echo nl2br("\nСумма налога в Декабре: {$sum_december}");

    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
?>