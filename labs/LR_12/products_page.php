<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR_12 | PRODUCTS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="lab12.php" class="mt-100 mb-100">Первая страница</a>
    <?php include "show_products.php";?>

    <form class="form flex flex-col w400 mb-100 mt-100" method="POST" action="add_product.php">
        <h2 class="title">Добавление продукта</h2>

        <div class="form__item">
            <label>Название</label>
            <input type="text" name="name">
        </div>

        <div class="form__item">
            <label>Категория</label>
            <?php include "select_tag_categories.php";?>
        </div>

        <div class="form__item">
            <label>Цена</label>
            <input type="text" name="price">
        </div>

        <input class="form__submit" type="submit">
    </form>

</body>
</html>