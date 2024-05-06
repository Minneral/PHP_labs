<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['file'])) {
        include('../config/db.php');

        session_start();

        $querry = $connection->prepare("UPDATE USERS SET avatar=:avatar WHERE id=:id");
        $querry->bindValue('avatar', file_get_contents($_FILES['file']['tmp_name']), PDO::PARAM_LOB);
        $querry->bindValue('id', $_SESSION['user_id'], PDO::PARAM_INT);
        $querry->execute();

        $querry = $connection->prepare("SELECT * FROM USERS WHERE id=:id");
        $querry->bindParam('id', $_SESSION['user_id'], PDO::PARAM_STR);
        $querry->execute();
        $_SESSION['user_avatar'] = $querry->fetch(PDO::FETCH_ASSOC)['avatar'];
    }
}