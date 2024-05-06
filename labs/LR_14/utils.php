<?php
// utils
{
    function output($str)
    {
        echo nl2br($str);
    }

    function pretty_open()
    {
        static $task_number = 1;
        output("<b>Задание {$task_number}</b>\n\n");
        $task_number++;
    }

    function pretty_close()
    {
        output("\n\n" . str_repeat('-', 200) . "\n\n\n");
    }

    function readWordsFromFile($filename)
    {
        $contents = file_get_contents($filename);
        $words = explode(' ', $contents);
        return array_filter($words); 
    }

    function writeWordsToFile($filename, $words)
    {
        file_put_contents($filename, implode(' ', $words));
    }
}