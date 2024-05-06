<?php

header("Location: ./lab12.php");

echo
"<div class=\"modal\">
    <form class=\"form\">
        <div class=\"form__item\">
        <label>Вы уверено, что хотите удалить категорию?</label>
        <input name=\"sure_submit\" type=\"submit\" value=\"Да\">
        <input type=\"submit\" value=\"Нет\">
        </div>
    </form>
</div>";