<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LR10</title>
</head>

<body>
    <div class="wrap">
        <div class="header">
            <div class="container">
                <div class="header__inner">
                    я хедер .__.
                </div>
            </div>
        </div>
        <main class="main">
            <div class="container">
                <div class="main__inner">
                    <div class="main__task"> <!--1 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 1</h1>

                        <form class="form" action="./exec1.php" method="POST">
                            <div class="form__item">
                                <label for="login">Логин</label>
                                <input type="text" name="login">
                            </div>

                            <div class="form__item">
                                <label for="password">Пароль</label>
                                <input type="password" name="password">
                            </div>

                            <input type="submit" value="Войти">
                        </form>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--2 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 2</h1>

                        <form class="form" action="./exec2.php" method="POST">
                            <label class="main__task-title">Контактные данные:</label>
                            <div class="form__item">
                                <label>ФИО</label>
                                <input type="text" name="fio" required>
                            </div>

                            <div class="form__item">
                                <label>Email</label>
                                <input type="text" name="email" required>
                            </div>

                            <div class="form__item">
                                <label>Телефон</label>
                                <input type="text" name="phone" required>
                            </div>

                            <label class="main__task-title">Тест:</label>

                            <div class="form__item">
                                <label>Какой код акции в KFC по средам?</label>
                                <input type="text" placeholder="Ответ" name="first">
                            </div>

                            <div class="form__item">
                                <label>Какой промокод в KFC сулит наибольшую выгоду?</label>
                                <fieldset>
                                    <div>
                                        <input type="radio" id="group1-1" name="second" value="7070">
                                        <label for="group1-1">7070</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="group1-2" name="second" value="5050">
                                        <label for="group1-2">5050</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="group1-3" name="second" value="1739">
                                        <label for="group1-3">1739</label>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form__item">
                                <label>По каким адресам находятся филиалы KFC?</label>
                                <fieldset>
                                    <div>
                                        <input type="checkbox" name="third[]" id="group2-1" value="ул. Бобруйская, 19">
                                        <label for="group2-1">ул. Бобруйская, 19</label>
                                    </div>

                                    <div>
                                        <input type="checkbox" name="third[]" id="group2-2" value="ул. Свердлова, 13а">
                                        <label for="group2-2">ул. Свердлова, 13а</label>
                                    </div>

                                    <div>
                                        <input type="checkbox" name="third[]" id="group2-3" value="ул. Карла Маркса, 18">
                                        <label for="group2-3">ул. Карла Маркса, 18</label>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form__item">
                                <label>В каком фастфуде в приоритете курица?</label>
                                <select name="fourth" id="select-1">
                                    <option value="МакБай">МакБай</option>
                                    <option value="KFC">KFC</option>
                                    <option value="BurgerKing">BurgerKing</option>
                                </select>
                            </div>

                            <div class="form__item">
                                <label>Что содержит купон 1739?</label>

                                <select name="fifth[]" id="select-2" multiple>
                                    <option value="Чизбургер">Чизбургер</option>
                                    <option value="Картошка фри">Картошка фри</option>
                                    <option value="Наггетсы">Наггетсы</option>
                                    <option value="Кока-кола">Кока-кола</option>
                                    <option value="Соус">Соус</option>
                                </select>
                            </div>

                            <div class="form__item">
                                <label>А вы любите ходить в KFC?</label>
                                <textarea name="sixth" id="textarea-1" cols="30" rows="10" placeholder="Да, очень!">

                                </textarea>
                            </div>

                            <input type="submit" value="Отправить">
                        </form>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--3 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 3</h1>

                        <form action="./exec3.php" class="form" method="POST">
                            <div class="form__item">
                                <label>Имя:</label>
                                <input type="text" name="name3">
                            </div>
                            <div class="form__item">
                                <label>Сообщение:</label>
                                <input type="text" name="mess">
                            </div>
                            <input type="submit" value="Отправить">
                            <a href="./exec3-2.php">Посмотреть сообщения</a>
                        </form>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--4 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 4</h1>

                        <div class="flex">
                            <div class="left">
                                <form method="POST">
                                    <input name="hero" id="spider" type="radio" value="Человек Паук">
                                    <label for="spider">Человек паук</label>
                                    <br>
                                    <input name="hero" id="turtle" type="radio" value="Черепашки Ниндзя">
                                    <label for="turtle">Черепашки Ниндзя</label>
                                    <br>
                                    <input name="hero" id="Kikoriki" type="radio" value="Смешарики">
                                    <label for="Kikoriki">Смешарики</label>
                                    <br>
                                    <input name="hero" id="luntik" type="radio" value="Лунтик">
                                    <label for="luntik">Лунтик</label>
                                    <br>
                                    <input name="hero" id="barboskini" type="radio" value="Барбоскины">
                                    <label for="barboskini">Барбоскины</label>
                                    <br>
                                    <input type="submit" value="Отправить">
                                </form>
                            </div>
                            <div class="right">
                                <?php
                                if (isset($_POST['hero'])) {
                                    switch ($_POST['hero']) {
                                        case "Человек Паук":
                                            echo "<img src=\"https://pic.rutubelist.ru/video/85/5d/855dae3803155a5855b545938a39e11e.jpg\">";
                                            break;
                                        case "Черепашки Ниндзя":
                                            echo "<img src=\"https://klike.net/uploads/posts/2023-02/1675400689_3-20.jpg\">";
                                            break;
                                        case "Смешарики":
                                            echo "<img src=\"https://fikiwiki.com/uploads/posts/2022-02/1644882876_6-fikiwiki-com-p-smeshariki-krasivie-kartinki-7.jpg\">";
                                            break;
                                        case "Лунтик":
                                            echo "<img src=\"https://phonoteka.top/uploads/posts/2022-09/1663873238_42-phonoteka-org-p-luntik-oboi-na-telefon-instagram-48.jpg\">";
                                            break;
                                        case "Барбоскины":
                                            echo "<img src=\"https://top-fon.com/uploads/posts/2023-01/1675133744_top-fon-com-p-barboskini-fon-dlya-prezentatsii-95.jpg\">";
                                            break;
                                        default:
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--5 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 5</h1>

                        <form class="form" method="POST">
                            <div class="form__item">
                                <label>Логин:</label>
                                <input type="text" name="login5">
                            </div>

                            <div class="form__item">
                                <label>Пароль:</label>
                                <input type="password" name="password5">
                            </div>

                            <input type="submit" value="Войти">
                        </form>

                        <?php

                        $login = md5("minneral");
                        $password = md5("123456");

                        if (isset($_POST["login5"]) && isset($_POST["password5"])) {
                            if ($login == md5($_POST["login5"]) && $password == md5($_POST["password5"])) {
                                echo "<h2 style=\"color: green;\">Доступ разрешен!</h2>";
                            } else {
                                echo "<h2 style=\"color: red;\">Доступ запрещен!</h2>";
                            }
                        }

                        ?>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--6 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 6</h1>

                        <form class="form" method="POST">
                            <select name="select6">
                                <option value="9 мая">9 мая</option>
                                <option value="1 июня">1 июня</option>
                                <option value="7 ноября">7 ноября</option>
                                <option value="1 января">1 января</option>
                            </select>
                            <input type="submit" value="Выбрать">
                        </form>

                        <?php

                        if (isset($_POST["select6"])) {
                            switch ($_POST["select6"]) {
                                case "9 мая":
                                    echo "День победы";
                                    break;
                                case "1 июня":
                                    echo "День защиты детей";
                                    break;
                                case "7 ноября":
                                    echo "Октябрьская революция";
                                    break;
                                case "1 января":
                                    echo "Новый год";
                                    break;
                                default:
                                    break;
                            }
                        }

                        ?>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--7 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 7</h1>

                        <?php
                        function createProduct($name, $manufacturer, $price, $color)
                        {
                            return ["name" => $name, "manufacturer" => $manufacturer, "price" => $price, "color" => $color];
                        }

                        $products = [
                            createProduct("IPhone 14", "Apple", 1000, "black"),
                            createProduct("Honor MagicBook", "Honor", 1000, "white"),
                            createProduct("xbox", "microsoft", 1500, "black"),
                            createProduct("playstation", "sony", 1400, "white"),
                            createProduct("Nike airforce", "Nike", 300, "white")
                        ];
                        ?>

                        <div class="flex">
                            <div class="left">
                                <form class="form" method="POST">
                                    <div class="form__item">
                                        <label>Название:</label>
                                        <input type="text" name="p_name">
                                    </div>

                                    <div class="form__item">
                                        <label>Производитель:</label>
                                        <input type="text" name="p_manufacturer">
                                    </div>

                                    <div class="form__item">
                                        <label>Минимальная цена:</label>
                                        <input type="text" name="p_minPrice">
                                    </div>

                                    <div class="form__item">
                                        <label>Максимальная цена:</label>
                                        <input type="text" name="p_maxPrice">
                                    </div>

                                    <div class="form__item">
                                        <label>Цвет:</label>
                                        <input type="text" name="p_color">
                                    </div>

                                    <input type="submit" value="Найти" name="p_find">
                                </form>
                            </div>

                            <div class="right">
                                <div class="product__list">
                                    <?php
                                    if (isset($_POST["p_find"])) {
                                        $search = array_values($products);

                                        if ($_POST["p_name"] != "") {
                                            $search = array_filter($search, function ($item) {
                                                return (strstr(strtolower($item["name"]), strtolower($_POST["p_name"])));
                                            });
                                        }

                                        if ($_POST["p_manufacturer"] != "") {
                                            $search = array_filter($search, function ($item) {
                                                return (strstr(strtolower($item["manufacturer"]), strtolower($_POST["p_manufacturer"])));
                                            });
                                        }

                                        if ($_POST["p_minPrice"] != "") {
                                            $search = array_filter($search, function ($item) {
                                                return ($item["price"] >= intval($_POST["p_minPrice"]));
                                            });
                                        }

                                        if ($_POST["p_maxPrice"] != "") {
                                            $search = array_filter($search, function ($item) {
                                                return ($item["price"] <= intval($_POST["p_maxPrice"]));
                                            });
                                        }


                                        if ($_POST["p_color"] != "") {
                                            $search = array_filter($search, function ($item) {
                                                return (strstr(strtolower($item["color"]), strtolower($_POST["p_color"])));
                                            });
                                        }

                                        foreach ($search as $product) {
                                            echo "<div class=\"product__list-item\">
                                                    <p>{$product["name"]}</p>
                                                    <p>{$product["manufacturer"]}</p>
                                                    <p>{$product["price"]}</p>
                                                    <p>{$product["color"]}</p>
                                                </div>";
                                        }
                                    } else {
                                        foreach ($products as $product) {
                                            echo "<div class=\"product__list-item\">
                                                    <p>{$product["name"]}</p>
                                                    <p>{$product["manufacturer"]}</p>
                                                    <p>{$product["price"]}</p>
                                                    <p>{$product["color"]}</p>
                                                </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--8 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 8</h1>
                        <form class="form" method="POST">
                            <div class="main__item">
                                <label>Введите предложение:</label>
                                <input type="text" name="task8_text">
                            </div>

                            <input type="submit" value="Отправить" name="task8">
                        </form>

                        <?php
                        $names = ["Иван", "Петр", "Анатолий"];
                        $name = $names[array_rand($names)];
                        if (isset($_POST["task8"])) {
                            echo strtr($_POST["task8_text"], array("@name@" => strval($name)));
                        }
                        ?>
                    </div> <!-- /main__task -->
                    <div class="main__task"> <!--9 задание-->
                        <h1 style="text-align: center; padding: 20px 0">Задание 9</h1>
                        <form class="form" method="POST">
                            <select name="select9">
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <div class="main__item">
                                <label for="task9_x">X:</label>
                                <input type="text" name="task9_x">
                            </div>

                            <div class="main__item">
                                <label for="task9_y">Y:</label>
                                <input type="text" name="task9_y">
                            </div>

                            <input type="submit" value="Отправить" name="task9_submit">

                            <?php
                            if (isset($_POST['task9_submit']) == false)
                                return;

                            $x_values = explode(', ', $_POST['task9_x']);
                            $y_values = explode(', ', $_POST['task9_y']);
                            $amount = intval($_POST['select9']);

                            # validate
                            {
                                if (count($x_values) != $amount) {
                                    echo "Количество значений X не совпадает с указанным количеством!";
                                    return;
                                }

                                if (count($y_values) != $amount) {
                                    echo "Количество значений Y не совпадает с указанным количеством!";
                                    return;
                                }

                                foreach ($x_values as $x) {
                                    if (is_numeric($x) == false) {
                                        echo $x . " - Неправильное значение для X!";
                                        return;
                                    }
                                }

                                foreach ($y_values as $y) {
                                    if (is_numeric($y) == false) {
                                        echo $y . " - Неправильное значение для Y!";
                                        return;
                                    }
                                }
                            }

                            $values = ['x' => $x_values, 'y' => $y_values];

                            # bubble sort
                            for ($i = 0; $i < $amount; $i++) {
                                for ($j = 0; $j < $amount - $i - 1; $j++) {
                                    if ($values['x'][$j] > $values['x'][$j + 1]) {
                                        $tmp_x = $values['x'][$j];
                                        $tmp_y = $values['y'][$j];

                                        $values['x'][$j] = $values['x'][$j + 1];
                                        $values['y'][$j] = $values['y'][$j + 1];

                                        $values['x'][$j + 1] = $tmp_x;
                                        $values['y'][$j + 1] = $tmp_y;
                                    }
                                }
                            }


                            echo "<style>
                            TABLE {
                                width: 300px; /* Ширина таблицы */
                                border-collapse: collapse; /* Убираем двойные линии между ячейками */
                               }
                               TD, TH {
                                padding: 3px; /* Поля вокруг содержимого таблицы */
                                border: 1px solid black; /* Параметры рамки */
                               }
                               TH {
                                background: #b0e0e6; /* Цвет фона */
                               }
                            </style>";

                            echo "
                            <table>
                            
                            <tr>
                                <th>X</th>
                                <th>Y</th>
                            </tr>";

                            for ($i = 0; $i < $amount; $i++) {
                                echo "
                                <tr><td>" . $values['x'][$i] . "</td><td>" . $values['y'][$i] . "</td></tr>
                                ";
                            }

                            echo "</table>";

                            ?>
                        </form>
                    </div> <!-- /main__task -->
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    я футер .__.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>