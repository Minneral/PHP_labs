<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR_12</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require('./show_categories.php'); ?>

    <a href="products_page.php" class="mt-100">Вторая страница</a>

    <form class="form flex flex-col w400 mb-100 mt-100" method="POST" action="add_category.php">
        <h2 class="title">Добавление категории</h2>

        <div class="form__item">
            <label>Название категории</label>
            <input type="text" name="category">
        </div>

        <input class="form__submit" type="submit">
    </form>

    <form class="form flex flex-col w400 mb-100" method="POST" action="delete_category.php" onsubmit="return confirmForm();" id="delete_category_form">
        <h2 class="title">Удаление категории</h2>

        <div class="form__item">
            <label>Название категории</label>
            <?php include "./select_tag_categories.php"; ?>
        </div>

        <input class="form__submit" type="submit">
    </form>

    <form class="form flex flex-col w400 mb-100" method="POST" action="edit_category.php">
        <h2 class="title">Редактирование категории</h2>

        <div class="form__item">
            <label>Старое Название</label>
            <?php include "./select_tag_categories.php"; ?>
        </div>

        <div class="form__item">
            <label>Новое название</label>
            <input type="text" name="new_category">
        </div>

        <input class="form__submit" type="submit">
    </form>

    <div id="confirmModal" class="modal">
        <div class="modal__inner">
            <p>Вы уверены, что хотите удалить категорию?</p>

            <div class="modal__btn">
                <button onclick="submitForm()">Да</button>
                <button onclick="closeModal()">Нет</button>
            </div>
        </div>
    </div>

</body>

<script>
    function confirmForm() {
        let modal = document.getElementById('confirmModal');
        modal.style.display = 'block';
        return false;
    }

    function submitForm() {
        document.getElementById('delete_category_form').submit();
    }

    function closeModal() {
        let modal = document.getElementById('confirmModal');
        modal.style.display = 'none';
    }
</script>

</html>