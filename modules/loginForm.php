<form method="POST" class="form" id="loginRequest">

    <div class="form-row">
        <input type="text" placeholder="" name="login">
        <label class="placeholder">Логин</label>
        <div class="underline"></div>
        <span class="error" id="lloginError"><?= @$loginError; ?></span>
    </div>

    <div class="form-row">
        <input type="password" placeholder="" name="pass">
        <label class="placeholder">Пароль</label>
        <div class="underline"></div>
        <span class="error" id="lpassError"><?= @$passError; ?></span>
    </div>

    <div class="form-submit">
        <button class="form-submit-btn" type="submit">Войти</button>
    </div>

</form>

<script>
    $(document).ready(function() {

        $('#loginRequest').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: './modules/validateLogin.php',
                data: formData,
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    try {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        $('#lloginError').html(jsonResponse.loginError);
                        $('#lpassError').html(jsonResponse.passError);

                    } catch (e) {
                        console.log('Произошла ошибка при обработке ответа сервера:', e);
                    }
                }

            });
        });
    });
</script>