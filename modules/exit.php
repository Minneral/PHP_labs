<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['exit'])) {
        session_start();
        session_unset();
        session_destroy();
    }
}