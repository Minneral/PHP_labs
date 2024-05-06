<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Прайс и заказы</title>
</head>

<body>

    <?php
    $goodsFile = 'goods.txt';
    $goodsList = file($goodsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    echo '<h2>Прайс товаров</h2>';
    echo '<table border="1">
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Фирма</th>
            <th>Заказать</th>
        </tr>';

    foreach ($goodsList as $line) {
        list($name, $price, $company) = explode(':', $line);
        echo "<tr>
            <td>$name</td>
            <td>$price</td>
            <td>$company</td>
            <td><button onclick=\"order('$name', '$price', '$company')\">Заказать</button></td>
          </tr>";
    }

    echo '</table>';
    ?>

    <script>
        function order(name, price, company) {
            var customerName = prompt("Введите ваше имя:");
            if (customerName !== null) {
                var quantity = prompt("Введите количество товара:");
                if (quantity !== null && !isNaN(quantity) && quantity > 0) {
                    var orderInfo = `Товар: ${name}, Цена: ${price}, Фирма: ${company}, Количество: ${quantity}, Покупатель: ${customerName}\\n`;
                    window.location.href = "process_order.php?order=" + encodeURIComponent(orderInfo);
                } else {
                    alert("Введено некорректное количество товара.");
                }
            }
        }
    </script>

</body>

</html>