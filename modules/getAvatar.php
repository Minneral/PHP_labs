<?php

session_start();
echo $_SESSION['user_avatar'];
header("Content-type: image");
header("Content-Disposition: inline; filename=avatar");