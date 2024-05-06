<?php
$login = md5("minneral");
$pass = md5("123456");

if(md5($_POST["login"]) == $login && md5($_POST["password"]) == $pass)
{
    session_start();
    echo "<form>
    <select>
        <option>1</option>
        <option>2</option>
    </select>
    <input type=\"text\">
    <input type=\"text\">
    <input type=\"button\" value=\"кнопка\">
    <input type=\"button\" value=\"КНОПКА\">
</form>";
}
else
{
    echo "<h1 style=\"color: red;\">Неправильно введен логин или пароль!</h1>";
}
