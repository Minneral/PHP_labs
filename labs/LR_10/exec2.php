<?php

$right_answers = 0;

$name_pattern = "/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u";
$mail_pattern = "/\w+@\w+.\w+/";
$phone_pattern = "/^\+375\d{9}$/";

$meta = [
    "fio" => $_POST["fio"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"]
];

if(preg_match($name_pattern, $meta["fio"]) == false)
{
    echo "Неверно указано имя!";
    return;
}

if(preg_match($mail_pattern, $meta["email"]) == false)
{
    echo "Неверно указан Email!";
    return;
}

if(preg_match($phone_pattern, $meta["phone"]) == false)
{
    echo "Неверно указан телефон!";
    return;
}

session_start();
$_SESSION["fio"] = $meta["fio"];

$answers = [
    "first" => "5050",
    "second" => "5050",
    "third" => ["ул. Бобруйская, 19", "ул. Карла Маркса, 18"],
    "fourth" => "KFC",
    "fifth" => ["Чизбургер", "Кока-кола"]
];

if ($_POST["first"] == $answers["first"]) {
    $right_answers++;
}
if ($_POST["second"] == $answers["second"]) {
    $right_answers++;
}
if ($_POST["third"] == $answers["third"]) {
    $right_answers++;
}
if ($_POST["fourth"] == $answers["fourth"]) {
    $right_answers++;
}
if ($_POST["fifth"] == $answers["fifth"]) {
    $right_answers++;
}

echo nl2br("Вы набрали: " . $right_answers . " баллов из 5\n\n");

function isCorrectAnswer($respond, $answer)
{
    if ($respond == $answer) {
        if (is_array($respond))
            echo "<p style=\"color: green;\">" . implode(", ", $respond) . "</p>";
        else
            echo "<p style=\"color: green;\">" . $respond . "</p>";
    } else {
        if (is_array($respond))
            echo "<p style=\"color: red;\">" . implode(", ", $respond) . "</p>";
        else
            echo "<p style=\"color: red;\">" . $respond . "</p>";
    }
}

echo "Какой код акции в KFC по средам?";
isCorrectAnswer($_POST["first"], $answers["first"]);

echo "Какой промокод в KFC сулит наибольшую выгоду?";
isCorrectAnswer($_POST["second"], $answers["second"]);

echo "По каким адресам находятся филиалы KFC?";
isCorrectAnswer($_POST["third"], $answers["third"]);

echo "В каком фастфуде в преоритете курица?";
isCorrectAnswer($_POST["fourth"], $answers["fourth"]);

echo "Что содержит купон 1739?";
isCorrectAnswer($_POST["fifth"], $answers["fifth"]);
