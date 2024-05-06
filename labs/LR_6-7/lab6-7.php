<?php
# 1. Создайте массив вида [[1, 2, 3], [4, 5, 6], [7, 8, 9]] (использовать цикл нельзя).
{
    echo nl2br("Задание 1:\n\n");
    
    $array = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
    $array1 = array([1, 2, 3], [4, 5, 6], [7, 8, 9]);
    $array2 = array(array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));
    $array3 = range(1, 9);
    $array3 = array_chunk($array3, 3);
    var_dump($array3);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 1

# 2. Дан массив $ x = массив ("c1"=>"Red", "c2"=>"Green", "c3"=>"Yellow", "c4"=>"Red"). Подсчитать общее число появлений определенного значения в массиве (использовать цикл нельзя).
{
    echo nl2br("Задание 2:\n\n");
    
    $x = array("c1"=>"Red", "c2"=>"Green", "c3"=>"Yellow", "c4"=>"Red");
    echo nl2br("Amount of \"Red\" values: " . array_count_values($x)["Red"] . "\n");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 2

# 3. Создайте массив, заполненный числами от 1 до 10. Проверьте, что в нем есть элемент со значением 3. Найдите сумму элементов данного массива.
# Найдите произведение элементов данного массива.
# Найдите среднее арифметическое элементов массива (использовать циклы и условные операторы нельзя).
{
    echo nl2br("Задание 3:\n\n");

    function foo($accumulator, $currentValue) {
        $accumulator *= $currentValue;
        return $accumulator;
    }
    
    $range = range(1, 10, 1);
    var_dump($range);

    echo nl2br("\n\n");
    
    echo("Multiply: " . array_reduce($range, "foo", 1));

    echo nl2br("\n\n");

    echo("Sum :" . array_sum($range));

    echo nl2br("\nПроизведение: " . array_product($range). "\n");
    echo nl2br("\n\n");

    echo nl2br("AVV of Range: " . array_sum($range) / count($range) . "\n");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 3

# 4. Создайте массив, заполненный буквами от 'a' до 'z' так, чтобы буквы шли в случайном порядке и не повторялись. Выведите на экран случайный ключ из данного массива.
# Выведите на экран случайный элемент данного массива. Выведите на экран его первый и последний элемент, причем так, чтобы в исходном массиве они исчезли.
# С помощью функции array_chunk разбейте этот массив на 6 подмассивов по четыре элементов в каждом (использовать циклы и условные операторы нельзя).
{
    echo nl2br("Задание 4:\n\n");
    
    $range = range('a', 'z');
    shuffle($range);

    echo nl2br("Range: " . implode('', $range) . "\n");
    echo nl2br("Random key of range: " . $x = array_rand($range) . "\n");
    echo nl2br("Value of random key: " . $range[(int)$x] . "\n");
    echo nl2br("First element: " . array_shift($range) . "\n");
    echo nl2br("Last element: " . array_pop($range) . "\n");
    echo nl2br("Range: " . implode('', $range) . "\n");

    $matrix = array_chunk($range, 4);
    echo nl2br("Subarrays: ");
    var_dump($matrix);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 4

# 5. Создайте массив ARR и заполните его числами от 1 до 26 так, чтобы ключами этих чисел были буквы английского алфавита: [‘a’=>1, ‘b’=>2…].
# Создать два массива: ARR_values, который содержит все значения массива ARR, второй ARR_keys, который содержит все ключи массива ARR.
# Создайте новый массив ARR_values_sqrt, в котором будут лежать квадратные корни данных элементов (использовать циклы и условные операторы нельзя).
{
    echo nl2br("Задание 5:\n\n");

    function boo($item) {
        return sqrt($item);
    }

    $ARR = array_combine(range('a', 'z'), range(1, 26));

    $ARR_values = array_values($ARR);
    $ARR_keys = array_keys($ARR);

    $ARR_values_sqrt = array_map("sqrt", $ARR_values);
    
    echo nl2br("ARR: ");
    var_dump($ARR);

    echo nl2br("\n\nARR_values: ");
    var_dump($ARR_values);

    echo nl2br("\n\nARR_keys: ");
    var_dump($ARR_keys);

    echo nl2br("\n\nARR_values_sqrt: ");
    var_dump($ARR_values_sqrt);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 5
?>