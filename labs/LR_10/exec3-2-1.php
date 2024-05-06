<?php
session_start();

unset($_SESSION["messages"]["".array_keys($_POST)[0]]);

header("Location: ./exec3-2.php");
