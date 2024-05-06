<div class="body">
    <div class="container">
        <div class="body__inner">


            <?php

            session_start();

            if (isset($_SESSION['user_id'])) {
                echo "<h1>Здравствуйте, " . $_SESSION['user_name'] . "!</h1>";
                echo "<h1>Роль: " . $_SESSION['user_role'] . "</h1>";

                if (
                    strtolower($_SESSION['user_role']) == 'admin'
                    || strtolower($_SESSION['user_role']) == 'админ'
                )
                    include('./modules/nav.php');
                else
                {
                    echo "<h2 class=\"empty\">Для вас пока ничего не доступно :(</h2>";
                }
            }
            ?>

        </div>
    </div>
</div>