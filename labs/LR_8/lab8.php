<?php

function createMatrix($n, $m, $values = null)
{
    $matrix = [];
    $values_amount = 0;
    if($values != null)
    {
        $values_amount = count($values);
    }
    for($i = 0, $iterator = 0; $i < $n; $i++)
    {
        $matrix[$i] = [];
        for($j = 0; $j < $m; $j++)
        {
            if($values == null || $values_amount < $iterator + 1)
            {
                $matrix[$i][$j] = random_int(1, 100);
            }
            else
            {
                $matrix[$i][$j] = $values[$iterator++];
            }
        }
    }

    return $matrix;
}

function printMatrix($matrix)
{
    $rows = count($matrix);

    for($i = 0; $i < $rows; $i++)
    {
		$columns = count($matrix[$i]);
        echo nl2br("\n");
        for($j = 0; $j < $columns; $j++)
        {
            echo $matrix[$i][$j] . "\t";
        }
    }
    echo nl2br("\n");
}

function output($str)
{
    echo nl2br($str);
}

# 1. Дана матрица A(N, M). Найдите её наибольший элемент и номера строки и столбца, на пересечении которых он находится. 
{
    echo nl2br("Задание 1:\n\n");

    $N = $M = 3;
    $max = $max_c = $max_r = 0;
    
    $matrix = createMatrix($N, $M, [1, 2, 1, 3, 1, 10, 2, 10, 1]);

    for($i = 0; $i < $N; $i++)
    {
        for($j = 0; $j < $M; $j++)
        {
            if($matrix[$i][$j] > $max)
            {
                $max = $matrix[$i][$j];
                $max_c = $j + 1;
                $max_r = $i + 1;
            }
        }
    }

    printMatrix($matrix);
    output("Amax: {$max}. Номера\nСтроки p = {$max_r}\nСтолбца q = {$max_c}");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 1

# 2. Дана матрица A(N, M). Поменяйте местами её наибольший и наименьший элементы. 
{
    echo nl2br("Задание 2:\n\n");
    
    $n = $m = 3;
    $A = createMatrix($n, $m);

    echo "A:";
    printMatrix($A);

    $max = ["value" => 0, "row" => 0, "column" => 0];
    $min = ["value" => PHP_INT_MAX, "row" => 0, "column" => 0];

    for($i = 0; $i < $n; $i++)
    {
        for($j = 0; $j < $m; $j++)
        {
            if($A[$i][$j] > $max["value"])
            {
                $max["value"] = $A[$i][$j];
                $max["row"] = $i;
                $max["column"] = $j;
            }
            elseif($A[$i][$j] < $min["value"])
            {
                $min["value"] = $A[$i][$j];
                $min["row"] = $i;
                $min["column"] = $j;
            }
        }
    }

    $A[$max["row"]][$max["column"]] = $min["value"];
    $A[$min["row"]][$min["column"]] = $max["value"];

    output("\nSwapped:");
    printMatrix($A);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 2

# 3. Даны две целочисленные матрицы A(N, M) и B(N, M). Подсчитайте (в отдельности) количество тех пар (aij , bij), для которых: 
{
    echo nl2br("Задание 3:\n\n");

    $N = 3;
    $M = 4;
    $km = $kb = $kr = 0;

    $A_values = [1, 5, 2, 1,
                1, 3, 1, 3,
                2, 2, 5, 1];

    $B_values = [1, 1, 3, 3,
                2, 1, 1, 2,
                1, 2, 6, 3];
    
    $A = createMatrix($N, $M, $A_values);
    $B = createMatrix($N, $M, $B_values);

    for($i = 0; $i < $N; $i++)
    {
        for($j = 0; $j < $M; $j++)
        {
            if($A[$i][$j] > $B[$i][$j])
                $kb++;
            elseif($A[$i][$j] < $B[$i][$j])
                $km++;
            else
                $kr++;
        }
    }

    output("N: {$N}, M: {$M}\nA:");
    printMatrix($A);
    output("B:");
    printMatrix($B);
    output("\nkm: {$km}\nkr: {$kr}\nkb: {$kb}");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 3

# 4. Вычислите значения (n и х задайте самостоятельно):
# а) sin x + sin2x + ... + sinnx ; 
# б) sin x + sin x2 + ... + sin xn ; 
# в) sin x + sin2x2 + ... + sinnxn.
{
    echo nl2br("Задание 4:\n\n");
    
    $n = 5;
    $x = 2;

    output("n = 5\nx = 3.1415\n");

    // а)
    $result = 0;
    for($i = 1; $i <= $n; $i++)
    {
        $result += sin($x)**$i;
    }
    output("а) sin x + sin2x + ... + sinnx = {$result}\n");

    // б)
    $result = 0;
    for($i = 1; $i <= $n; $i++)
    {
        $result += sin($x**$i);
    }
    output("б) sin x + sin x2 + ... + sin xn = {$result}\n");


    // в)
    $result = 0;
    for($i = 1; $i <= $n; $i++)
    {
        $result += sin($x**$i)**$i;
    }
    output("в) sin x + sin2x2 + ... + sinnxn = {$result}\n");


    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 4

# 5. Из заданных векторов X(N) и Y(N) получите вектор Z(2N) c элементами (x1, y1, x2, y2, ..., xN , yN) . 
{
    echo nl2br("Задание 5:\n\n");

    $N = 5;

    $X = createMatrix(1, $N, [1, 3, 5, 7, 9]);
    $Y = createMatrix(1, $N, [2, 4, 6, 8, 10]);
    $Z = array();

    for($i = 0; $i < $N; $i++)
    {
        $Z[] = $X[0][$i];
        $Z[] = $Y[0][$i];
    }
    
    output("X({$N}): ");
    printMatrix($X);

    output("\nY({$N}): ");
    printMatrix($Y);

    output("\nZ(". 2*$N ."): ");
    printMatrix(createMatrix(1, 2*$N, $Z));
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 5

# 6. Подсчитайте число и сумму положительных, число и произведение отрицательных элементов заданного массива A(N). 
{
    echo nl2br("Задание 6:\n\n");

    $A1 = [1, -2, -3, 0, 2];
    $A2 = [4, 0, 7, 1];
    $A3 = [0, 0, 0];

    $KPol = $KOt = $SPol = 0;
    $PrOt = 1;

    function foo($array)
    {
        $GLOBALS['KPol'] = $GLOBALS['KOt'] = $GLOBALS['SPol'] = 0;
        $GLOBALS['PrOt'] = 1;

        foreach($array as $item)
        {
            if($item  > 0)
            {
                $GLOBALS['KPol']++;
                $GLOBALS['SPol'] += $item;
            }
            elseif($item < 0)
            {
                $GLOBALS['KOt']++;
                $GLOBALS['PrOt'] *= $item;
            }
        }

        output("KPol = {$GLOBALS['KPol']};\tSPol = {$GLOBALS['SPol']}\n");


        if($GLOBALS['KOt'] > 0)
            output("KOt = {$GLOBALS['KOt']};\tPrOt = {$GLOBALS['PrOt']}\n");
        else
            output("Вывод: \"Нет отрицательных\"\n");

    }

    //foo($A1);
    //foo($A2);
    foo($A3);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 6

# 7. Вывести на экран в возрастающем порядке все трехзначные числа, в десятичной записи которых нет одинаковых цифр.  
{
    echo nl2br("Задание 7:\n\n");

    function IsComponentsUnique($array)
    {
        $amount_of_components = count($array);
        $bResult = true;

        for($i = 0; $i < $amount_of_components - 1; $i++)
        {
            for($j = $i + 1; $j < $amount_of_components; $j++)
            {
                if($array[$i] == $array[$j])
                {
                    $bResult = false;
                }
            }
        }

        return $bResult;
    }

    function IsGrowing($array)
    {
        $amount_of_components = count($array);
        $bResult = true;

        for($i = 0; $i < $amount_of_components - 1; $i++)
        {
            if($array[$i] > $array[$i + 1])
            {
                $bResult = false;
            }
        }

        return $bResult;
    }

    for($i = 100; $i < 1000; $i++)
    {
        $s = str_split(strval($i));
        
        if(IsComponentsUnique($s) && IsGrowing($s))
        {
            echo $i . " ";
        }

    }
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 7

# 8. 
{
    echo nl2br("Задание 8:\n\n");

    function boo($matrix)
    {
        $S = 0;
        $N = count($matrix);

        for($i = 0; $i < $N; $i++)
        {
            for($j = 0; $j < $N; $j++)
            {
                if($i == $j && $matrix[$i][$j] < 0)
                {
                    for($k = 0; $k < $N; $k++)
                    {
                        $S += $matrix[$i][$k];
                    }
                }
            }
        }

        return $S;
    }

    $A1 = createMatrix(4, 4, [-1, 2, 1, 2, 3, 5, 2, 1, 2, 3, -2, 1, 2, 1, 3, 2]);
    $A2 = createMatrix(3, 3, [1, 2, -3, 3, 2, 1, 2, 1, 2]);

    output("S1 = " . boo($A1) . "\n");
    output("S2 = " . boo($A2) . "\n");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 8

# 9. В массиве A(N, N) вычислить две суммы элементов, расположенных ниже и выше главной диагонали. 
{
    echo nl2br("Задание 9:\n\n");

    $N = 3;
    $upper_sum = $lower_sum = 0;

    $A = createMatrix($N, $N, [1,2,1,3,1,10,2,10,1]);

    for($i = 0; $i < $N; $i++)
    {
        for($j = 0; $j < $N; $j++)
        {
            if($j != $i)
            {
                if($i < $j)
                {
                    $upper_sum += $A[$i][$j];
                }
                else
                {
                    $lower_sum += $A[$i][$j];
                }
            }
        }
    }

    output("A:");
    printMatrix($A);
    output("\nСумма выше: {$upper_sum}\nСумма ниже: {$lower_sum}");
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 9

# 10. 
{
    echo nl2br("Задание 10:\n\n");

    function generate_row($id, $name, $parent_id)
    {
        return array('id' => $id, 'name' => $name, 'parent_id' => $parent_id);
    }

    function generate_tree($tree, $parent_id = 0)
    {
        $root = "<ul>";
        foreach($tree as $item)
        {
            if ($item['parent_id'] == $parent_id)
			{
                $root .= "<li>{$item['name']}</li>";
                $root .= generate_tree($tree, $item['id']);
            }
        }
        $root .= "</ul>";
        return $root;
    }

    $table = [1 => generate_row(1, "Глава 1", 0),
            generate_row(2, "Глава 2", 0),
            generate_row(3, "Глава 3", 0),
            generate_row(4, "Глава 4", 0),
            generate_row(5, "Основы языка PHP. Сценарии", 1),
            generate_row(6, "Использование web-сервера для выполнения PHP-сценариев", 1),
            generate_row(7, "Первый PHP-скрипт", 1),
            generate_row(8, "Общие понятия о переменных PHP", 2),
            generate_row(9, "Типы данных (переменных) в PHP", 2),
            generate_row(10, "Арифметические операции", 3),
            generate_row(11, "Операции инкремента и декремента", 3),
            generate_row(12, "Операции присвоения", 3),
            generate_row(13, "Простые математические функции", 4),
            generate_row(14, "Выработка случайных числе", 4),
            generate_row(15, "Математические константы", 4),
    ];
    
    echo generate_tree($table);
    
    echo nl2br("\n" . str_repeat('-', 300) ."\n");
}
#endregion 10


{

}
?>