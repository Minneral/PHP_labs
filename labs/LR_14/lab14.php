<?php

include('utils.php');

// 1
{
    pretty_open();

    $file = fopen('task1_done.txt', 'w+');
    $message = "Lorem Ipsum";
    fwrite($file, $message, strlen($message));

    fclose($file);

    pretty_close();
}

// 2
{
    pretty_open();

    $words1 = readWordsFromFile('task2_1.txt');
    $words2 = readWordsFromFile('task2_2.txt');

    // а)
    $uniqueInFile1 = array_diff($words1, $words2);
    writeWordsToFile('task2_a.txt', $uniqueInFile1);

    // б)
    $commonWords = array_intersect($words1, $words2);
    writeWordsToFile('task2_b.txt', $commonWords);

    // в)
    $wordCounts1 = array_count_values($words1);
    $wordCounts2 = array_count_values($words2);

    $commonOverTwo = [];
    foreach ($commonWords as $word) {
        if ($wordCounts1[$word] > 2 && $wordCounts2[$word] > 2) {
            $commonOverTwo[] = $word;
        }
    }
    writeWordsToFile('task2_c.txt', $commonOverTwo);


    pretty_close();
}

// 3
{
    pretty_open();

    $file = fopen('task3.txt', 'r');
    $words = [];

    while (feof($file) == false) {
        //$words[] = fgets($file);
        $words = fgetcsv($file, null, ' ');
    }
    fclose($file);

    sort($words);

    writeWordsToFile("task3_done.txt", $words);
    //file_put_contents('task3_done.txt', implode(' ', $words));

    pretty_close();
}

// 4
{
    pretty_open();

    $lines = file('task4.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $uniqueEmails = [];
    $uniqueNames = [];

    $result = "";

    foreach ($lines as $line) {

        $name = explode(':', $line)[0];
        $password = explode(':', $line)[1];
        $email = explode(':', $line)[2];


        if (!in_array($email, $uniqueEmails) && !in_array($name, $uniqueNames)) {
            $uniqueEmails[] = $email;
            $uniqueNames[] = $name;

            $result .= "$name:$password:$email\n";
        }
    }

    file_put_contents('task4_done.txt', $result);

    pretty_close();
}

// 5
{
    pretty_open();

    echo "<a href='task5.php'>Задание 5</a>";

    pretty_close();
}

// 6
{
    pretty_open();

    echo "<a href='task6.php'>Задание 6</a>";

    pretty_close();
}

// 7
{
    pretty_open();

    echo "<a href='task7.php'>Задание 7</a>";

    pretty_close();
}
