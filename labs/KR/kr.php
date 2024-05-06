<?

// 18
// $arr1 = ['a', 'b', 'c', 'd', 'q', 'y', 'o', 'p'];
// $arr2 = [1, 2, 3, 4, 5, 6, 7, 8];
// $arr3 = array_combine($arr1, $arr2);
// echo nl2br("arr1: ");
// var_dump($arr1);

// echo nl2br("\narr2: ");
// var_dump($arr2);

// echo nl2br("\narr3: ");
// var_dump($arr3);

// echo nl2br("\nRandom key: " . array_rand($arr3) . "\n");

// shuffle($arr3);
// echo nl2br("\narr3 shuffled: ");
// var_dump($arr3);
// $sArr3 = implode('', $arr3);
// echo nl2br(substr($sArr3, 0, 2) . " | " . substr($sArr3, -3));

// echo nl2br("\nFlipped arr3: ");
// var_dump(array_flip($arr3));

// 19

// $range = range(10, 41);
// shuffle($range);
// array_slice($range, 0, 8);

// echo nl2br("Arr: ");
// var_dump($arr);

// $min1 = min($arr);
// $min2 = min(array_diff($arr, [$min1]));
// $min3 = min(array_diff($arr, [$min1, $min2]));
// $average = array_sum([$min1, $min2, $min3]) / 3;

// echo nl2br("\nMin1 = {$min1}\nMin2 = {$min2}\nMin3 = {$min3}\nAverage = {$average}");

// 20

// $range = range(100, 500);

// shuffle($range);
// $arr[] = array_merge(["Петров"], array_slice($range, 0, 12));

// shuffle($range);
// $arr[] = array_merge(["Шимко"], array_slice($range, 0, 12));

// shuffle($range);
// $arr[] = array_merge(["Таланков"], array_slice($range, 0, 12));

// shuffle($range);
// $arr[] = array_merge(["Нгуен"], array_slice($range, 0, 12));

// shuffle($range);
// $arr[] = array_merge(["Тихонович"], array_slice($range, 0, 12));

// $novemberColumn = [];
// $decemberColumn = [];
// $aprilColumn = [];

// function november($item)
// {
//     global $novemberColumn;
//     $novemberColumn[] = $item[11];
// }
// function december($item)
// {
//     global $decemberColumn;
//     $decemberColumn[] = $item[12];
// }
// function april($item)
// {
//     global $aprilColumn;
//     $aprilColumn[] = $item[12];
// }
// array_map('november', $arr);
// array_map('december', $arr);
// array_map('april', $arr);

// echo nl2br("Сумма налога за ноябрь: " . array_sum($novemberColumn) . "\nСумма налога за декабрь: " . array_sum($decemberColumn) . "\n");
// echo nl2br("Минимальный налог в апреле у: " . $arr[array_search(min($aprilColumn), $aprilColumn)][0]);
// echo nl2br("\nМаксимальный налог в ноябре у: " . $arr[array_search(max($novemberColumn), $novemberColumn)][0]);






// Задано количество лекций и лабораторных, посещенных студентом за семестр.
//Если студент посетил не менее 10 лекций и 16 лабораторных или 15 лекций и 15 лабораторных, то вывести сообщение "Есть допуск к экзамену".
//Если студент посетил не менее 9 лекций и 16 лабораторных, то вывести сообщение "Нужен допуск по теории".
//Если студент посетил не менее 15 лекций и 5 лабораторных, то вывести сообщение "Надо подтягивать практику".


$lab = 16;
$lec = 9;
$mask = 0b111;

$flag1 = (($lec >= 10) && ($lab == 16)) || (($lec == 15) && ($lab == 15));
$flag2 = ($lec >= 9 && $lab == 16);
$flag3 = ($lec >= 15 && $lab == 5);

$flags = (int)$flag1 << 2 | (int)$flag2 << 1 | (int)$flag3;

switch($flags)
{
    case 0b100:
        echo "Есть допуск к экзамену";
        break;
    case 0b10;
        echo "Нужен допуск по теории";
        break;
    case 0b1:
        echo "Надо подтягивать практику";
        break;
}

?>