<?PHP

# 1. Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90' (не используя циклы).
{
echo nl2br("Задание 1:\n\n");
$str = "1234567890";
var_dump(str_split($str, 2));

echo nl2br("\n" . str_repeat('-', 300) ."\n");

#endregion 1


# 2. Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши (не используя циклы).
echo nl2br("\nЗадание 2:\n\n");

$str = "/php/";
var_dump(trim($str, "/"));

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 2


# 3. Создайте строку из 7-ти случайных маленьких латинских букв так, чтобы буквы не повторялись.
# Нужно сделать так, чтобы в нашей строке могла быть любая латинская буква, а не ограниченный набор. Нельзя использовать операторы проверки условия и циклы.
{
echo nl2br("\nЗадание 3:\n\n");

$range = range('a', 'z');
$entries = [];
$str = [];

$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];
$str[] = $entries[] = $range[array_rand(array_diff($range, $entries))];


$str = implode('', $str);

var_dump($str);

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 3



# 4. Дана строка 'abc abc abc'. Определите позицию первой и последней буквы 'b'.
# Найдите позицию первой найденной буквы «b», если начать поиск не с начала строки, а позиции 3 (не используя циклы).
{
echo nl2br("\nЗадание 4:\n\n");

$str = "abc abc abc";
echo nl2br(strpos($str, 'b') . "\n");
echo nl2br(strrpos($str, 'b') . "\n");
echo nl2br(strpos($str, 'b', 3));

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 4



# 5. Дана строка $str = '123123123';. Замените в ней все цифры 1 на букву 'a', цифры 2 на букву 'c', а цифры 3 на букву 'b'.
# Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).
{
echo nl2br("\nЗадание 5:\n\n");

$str = "123123123";
echo nl2br(strtr($str, '123', 'abc') . "\n");
echo strtr($str, array(1 => 'a', 2 => 'b', 3 => 'c'));

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 5



# 6. Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела (не используя циклы).
{
echo nl2br("\nЗадание 6:\n\n");

$str = "aaa aaa aaa aaa aaa";
if($enter = strpos($str, ' '))
{
    echo strpos($str, ' ', $enter + 1);
}

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 6


# 7. Дана строка $str = 'html, <b>php</b>, js';. Удалите все теги из этой строки, кроме тегов <b> и <i> (не используя циклы).
{
echo nl2br("\nЗадание 7:\n\n");

$str = "html, <b>php</b>, js";
echo strip_tags($str, '<b><i>');

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 7


# 8. Дана строка $str = 'html, css, php, javascript';. Выведите на экран код третьего, пятого, седьмого символов (не используя циклы).
{
echo nl2br("\nЗадание 8:\n\n");

$str = "html, css, php, javascript";

echo nl2br("str[2]: " . ord($str[2]) . "\n");
echo nl2br("str[4]: " . ord($str[4]) . "\n");
echo nl2br("str[6]: " . ord($str[6]) . "\n");


echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 8


# 9. Имеется строка символов $main_str. Переменной $first_str присвоить первые n символов строки $main_str
# (n – определяется случайным образом, но не больше половины длины строки $main_str), а переменной $last_str присвоить последние n символов строки $main_str.
# Вывести на экран исходную строку, полученные строки, а также сообщение «строки равны» если строки $first_str и $last_str совпадают посимвольно,
# и сообщение «строки не равны» в противном случае (не используя циклы).
{
echo nl2br("\nЗадание 9:\n\n");

$main_str = implode('', range('a', 'z'));
$n = rand(1, (int)(strlen($main_str) / 2) - 1);

$first_str = substr($main_str, 0, $n);
$last_str = substr($main_str, -$n);

echo nl2br("Origin:\t{$main_str}\nFirst:\t{$first_str}\nLast:\t{$last_str}\n\n");
if(strcmp($first_str, $last_str) == 0)
{
    echo 'Строки равны!';
}
else
{
    echo 'Строки не равны!';
}

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 9


# 10. Дана строка следующего вида: 5 цифр, затем пробел, затем еще 5 цифр. Например, дана такая строка '12345 67890'. Сделайте из нее строку '54321 09876' (не используя циклы).
{
echo nl2br("\nЗадание 10:\n\n");

$str = "12345 67890";
echo implode(' ', array(
    strrev(explode(' ', $str)[0]),
    strrev(explode(' ', $str)[1])
));

echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
# endregion 10

?>