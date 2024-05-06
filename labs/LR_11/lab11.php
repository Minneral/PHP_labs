<?php

// Utils
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
}

// Задание 1
{
    pretty_open();

    $pattern1 = '/^\D+@\D+\.\D+$/';
    $input = 'test@test.test';

    if (preg_match($pattern1, $input)) {
        echo "Passed";
    }
    else
    {
        echo 'Error';
    }

    pretty_close();
}

// Задание 2
{
    pretty_open();

    $pattern2 = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)\w{8,}$/';
    $input = 'mkA3dndfj';

    if (preg_match($pattern2, $input)) {
        echo "Passed";
    }

    pretty_close();
}

//Задание 3
{
    pretty_open();

    $pattern3 = '/(?<![a-zA-Zа-яА-Я])-(?![a-zA-Zа-яА-Я])/u';
    $input = 'Мама мыла как-то раму - это что-то значит';

    echo preg_replace($pattern3, '&mdash;', $input);

    pretty_close();
}

// Задание 4
{
    pretty_open();

    $pattern4 = '/^[а-я]{1}\d{3}[а-я]{2}$/ui';
    $input = 'а123вд';

    if (preg_match($pattern4, $input)) {
        echo "Passed";
    }


    pretty_close();
}

// Задание 5
{
    pretty_open();

    $pattern5 = '/[а-яА-Я]*ое/u';

    $input = "ясное, синее, малое";

    $result = [];

    preg_match_all($pattern5, $input, $result);

    output("Input: " . $input);
    output("\nResult: " . implode(', ', $result[0]));


    ####

    $input = 'синее, ясно, мало';
    preg_match_all($pattern5, $input, $result);

    output("\n\nInput: " . $input);
    output("\nResult: " . implode(', ', $result[0]));

    pretty_close();
}

// Задание 6
{
    pretty_open();

    $pattern6 = '/(?<=[a-z])[1-9]+/i';
    $input = 'A1B2C3';
    $result = [];

    echo preg_replace_callback($pattern6, function ($match) {
        return intval($match[0]) ** 2;
    }, $input);

    pretty_close();
}

// Задание 7
{
    pretty_open();

    function SplitAndCount($text)
    {
        $pattern7 = '/\b[а-яa-z]+\b/ui';
        $result = [];
        $text = mb_strtolower($text);

        preg_match_all($pattern7, $text, $result);

        return array_count_values($result[0]);
    }

    $text = 'Много много букоф мало слоф';
    var_dump(SplitAndCount($text));

    pretty_close();
}

// Задание 8
{
    pretty_open();

    $pattern8 = '/д\s?[yу]\s?[pр]\s?[аa]\s?[kк]/iu';
    $input = "Ты Д уР а k !";

    echo preg_replace($pattern8, 'хороший человек', $input);

    pretty_close();
}

// Задание 9 ????
{
    pretty_open();

    $pattern9 = '/\n[ \t]+/mu';
    $input = "  Это текст с отступами.\n\tВторой абзац с табуляцией.\n   Третий абзац с пробелами.";

    output($input . "\n\n------\n\n");
    output(preg_replace($pattern9, "\n\n", $input));

    pretty_close();
}

// Задание 10
{
    pretty_open();

    $rf = fopen("text.txt", 'r+');
    $text = fgets($rf, 100);
    $text = preg_replace('/привет/iu', 'привет, друг', $text);
    file_put_contents('text.txt', $text);
    fclose($rf);

    pretty_close();
}

// Задание 11
{
    pretty_open();

    $coolStory = "Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: новая модель организационной деятельности а также свежий взгляд на привычные вещи — безусловно открывает координально новые горизонты для модели развития. Ясность нашей позиции очевидна: высокотехнологичная концепция общественного уклада способствует повышению качества кластеризации усилий. Приятно, граждане, наблюдать, как элементы политического процесса рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок. Сдесь имеется спорная точка зрения, гласящая примерно следующее: независимые государства представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть описаны максимально подробно. Каждый из нас зделает очевидную вещь: постоянное информационно-пропагандистское обеспечение нашей деятельности, в своём классическом представлении, допускает внедрение первоочередных требований. Прежде всего, новая модель организационной деятельности предопределяет высокую востребованность вывода текущих активов. Равным образом,курс на социально-ориентированный национальный проект является качественно новой ступенью новых принципов формирования материально-технической и кадровой базы. А ещё диаграммы связей могут быть заблокированы в рамках своих собственных рациональных ограничений. Таким образом, постоянное информационно-пропагандистское обеспечение нашей деятельности не даёт нам иного выбора, кроме определения своевременного выполнения сверхзадачи. Повседневная практика показывает, что консультация с широким активом но также свежый взгляд на привычные вещи — безусловно открывает новые горизонты для как самодостаточных, так и внешне зависимых концептуальных решений. В целом, конечно, синтетическое тестирование в значительной степени обусловливает важность укрепления моральных ценностей. Являясь всего лишь частью общей картины, элементы политического процесса призваны к ответу. Наше дело не так однозначно, как может показаться: синтетическое тестирование напрямую зависит от экспериментов, поражающих по своей масштабности и грандиозности. Имеется спорная точка зрения, гласящая примерно следующее: непосредственные участники технического прогресса могут быть превращены в посмешище, хотя само их существование приносит несомненную пользу обществу. Также как высокотехнологичная концепция общественного уклада напрямую зависит от системы массового участия.";
    output("$coolStory\n\n");

    $regExp = "/(координально)|(сдесь)|(здела[лнюет]{1,2})|(([а-яёА-ЯЁa-z0-9]{1,})\\s+а\\s+)|(([а-яёА-ЯЁa-z0-9]{1,})\\s+но\\s+)|([,\\.!\\?:;][^\\s])|(\\s?[а-яё]*(жы|шы)[а-яё]*[\\s\\.,?!:;]+)/iUu";

    $possibleErrors = array(
        "/координально/uUi"        => "- Ошибка в слове \"кардинально\".",
        "/сдесь/uUi"               => "- Не \"сдесь\", а \"здесь\".",
        "/здела[лниаюет]{1,2}/uUi"     => "- Приставки \"з\" нет в русском языке.",
        "/([а-яёА-ЯЁa-z0-9]{1,})\\s+а\\s+/ui"    => "- Пропущена запятая перед \"а\".",
        "/([а-яёА-ЯЁa-z0-9]{1,})\\s+но\\s+/ui"   => "- Пропущена запятая перед \"но\".",
        "/\\s?[а-яё]*(жы|шы)[а-яё]*[\\s\\.,?!:;]+/uUi"    => "\"- Жи-Ши\" пиши с \"и\"!",
        "/[,\\.!\\?:;][^\\s]/uUi"  => "- Пропущен пробел после знака препинания."
    );

    $errs = array();
    preg_match_all($regExp, $coolStory, $errs);
    $matches = $errs[0];
    $notices = array();
    for ($i = 0; $i < count($matches); $i++) {
        foreach ($possibleErrors as $pattern => $message) {
            if (preg_match($pattern, $matches[$i])) {
                $notices[$i] = $message;
            }
        }
    }
    $i = 0;
    foreach ($matches as $value) {
        $position = mb_strpos($coolStory, $value);
        $contextPrev = mb_substr($coolStory, $position - 30, 30);
        $contextFollow = mb_substr($coolStory, $position + mb_strlen($value), 30);
        echo "Ошибка: ... ";
        echo "$contextPrev<span>$value</span>$contextFollow...";
        output("$notices[$i]\n");
        $i++;
    }


    ######

    output("\n\n$coolStory\n\n");
    $text = $coolStory;
    $regProbelZnak = '/([\,\;\:\!\?\»])([а-яёА-ЯЁa-z0-9«])/iu';
    $regKardinalno = '/координально/iu';
    $regCdes = '/(сдесь)/iu';
    $regSdelal = '/(здел)(ал|аю|ан)/iu';
    $regJiShi = '/([Жж]|[Шш])ы/iu';
    $regProbelNoA = '/([а-яёА-ЯЁa-z0-9]{1,})(\\s+)(а|но)(\\s+)/ui';
    $regProbel = '/([а-яёА-ЯЁa-z0-9]{1,})([,\\.!\\?:;])([^\\s])/iu';

    echo "<style>span{color:red}</style>";

    $text = preg_replace($regProbelZnak, '<strong><span>$1 $2<span></strong>', $text);
    $text = preg_replace($regKardinalno, '<strong><span>кардинально<span></strong>', $text);
    $text = preg_replace($regCdes, '<strong><span>здесь<span></strong>', $text);
    $text = preg_replace($regSdelal, '<strong><span>сдел$2<span></strong>', $text);
    $text = preg_replace($regJiShi, '<strong><span>$1и<span></strong>', $text);
    $text = preg_replace($regProbelNoA, '<strong><span>$1,$2$3$4<span></strong>', $text);
    $text = preg_replace($regProbel, '<strong><span>$1$2 $3<span></strong>', $text);

    output("$text\n");

    pretty_close();
}

// Задание 12
{
    pretty_open();

    $input = 'Food is necessary for living, especially when you are young and your body grows up. You wake up, and you are ready for the first meal of the day, it is a breakfast.';


    output("Строка: " . $input);
    output("\n\nСтрока заканчивается на breakfast: ");
    if (preg_match('/\bbreakfast\b[.,!?]*$/i', $input)) {
        echo 'true';
    } else {
        echo 'false';
    }

    output("\nСтрока начинается на food: ");
    if (preg_match('/^\bfood\b/i', $input)) {
        echo 'true';
    } else {
        echo 'false';
    }

    output("\nСтрока является просто строкой food: ");
    if (preg_match('/^food$/i', $input)) {
        echo 'true';
    } else {
        echo 'false';
    }


    pretty_close();
}
