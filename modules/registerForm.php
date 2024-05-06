<form method="POST" class="form" id="registerRequest">

    <div class="form-row">
        <input type="text" placeholder="" name="name">
        <label class="placeholder">ФИО</label>
        <div class="underline"></div>
        <span class="error" id="nameError"><?= @$nameError; ?></span>
    </div>

    <div class="form-row">
        <input type="text" placeholder="" name="login">
        <label class="placeholder">Логин</label>
        <div class="underline"></div>
        <span class="error" id="loginError"><?= @$loginError; ?></span>
    </div>

    <div class="form-row">
        <input type="text" placeholder="" name="email">
        <label class="placeholder">Email</label>
        <div class="underline"></div>
        <span class="error" id="emailError"><?= @$emailError; ?></span>
    </div>

    <div class="form-row">
        <input type="password" placeholder="" name="pass">
        <label class="placeholder">Пароль</label>
        <div class="underline"></div>
        <span class="error" id="passError"><?= @$passError; ?></span>
    </div>

    <div class="form-row">
        <input type="password" placeholder="" name="passConfirm">
        <label class="placeholder">Повторите пароль</label>
        <div class="underline"></div>
        <span class="error" id="passConfirmError"><?= @$passConfirmError; ?></span>
    </div>

    <div class="form-row">
        <input type="text" placeholder="" name="phone">
        <label class="placeholder">Номер телефона</label>
        <div class="underline"></div>
        <span class="error" id="phoneError"><?= @$phoneError; ?></span>
    </div>

    <div class="form-row radio">
        <h4 class="form-row-title">Выберите ваш пол:</h4>
        <div class="form-genders">
            <div class="form-gender">
                <input type="radio" id="male" name="gender" value="Мужской">
                <label for="male" class="gender">Мужской</label>
            </div>
            <div class="form-gender">
                <input type="radio" id="female" name="gender" value="Женский">
                <label for="female" class="gender">Женский</label>
            </div>
            <div class="form-gender">
                <input type="radio" id="other" name="gender" value="Другой">
                <label for="other" class="gender">Другой</label>
            </div>
        </div>
        <span class="error" id="genderError"><?= @$genderError; ?></span>
    </div>

    <div class="form-row radio">
        <div class="form-captcha">
            <div class="form-captcha-source">
                <img src="./modules/captcha.php" id="captchaImg" alt="captcha">
                <a href="" id="reloadCaptcha">Обновить капчу</a>
            </div>

            <div class="form-captcha-input">
                <div class="form-row">
                    <input type="text" placeholder="" name="captcha">
                    <label class="placeholder">Код на картинке</label>
                    <div class="underline"></div>
                    <span class="error" id="captchaError"><?= @$captchaError; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-submit">
        <button class="form-submit-btn" type="submit">Зарегистрироваться</button>
    </div>


</form>

<script>
    
    $(document).ready(function() {

        $('#reloadCaptcha').click(function(event) {
            event.preventDefault();

            $.ajax({
                type: 'GET',
                url: './modules/captcha.php',
                data: 'value',
                success: function(response) {
                    $('#captchaImg').attr('src', './modules/captcha.php?' + new Date().getTime());
                },
                error: function(xhr, status, error) {
                    console.log('Ошибка: ' + error);
                }
            })
        });

        $('#registerRequest').submit(function(event) {
            event.preventDefault(); // Предотвращаем стандартное поведение формы

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: './modules/validateRegister.php', // Используйте текущий файл в качестве URL
                data: formData,
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(error);

                    try {
                        var jsonResponse = JSON.parse(xhr.responseText);

                        $('#nameError').html(jsonResponse.nameError);
                        $('#loginError').html(jsonResponse.loginError);
                        $('#emailError').html(jsonResponse.emailError);
                        $('#passError').html(jsonResponse.passError);
                        $('#passConfirmError').html(jsonResponse.passConfirmError);
                        $('#phoneError').html(jsonResponse.phoneError);
                        $('#genderError').html(jsonResponse.genderError);
                        $('#captchaError').html(jsonResponse.captchaError);

                        console.log(jsonResponse);

                        if (jsonResponse.captchaError == 'Неправильно введена капча!') {
                            $('#captchaImg').attr('src', './modules/captcha.php?' + new Date().getTime());


                        }
                    } catch (e) {
                        // В случае некорректного JSON
                        console.log('Произошла ошибка при обработке ответа сервера:', e);
                    }
                }

            });
        });
    });
</script>