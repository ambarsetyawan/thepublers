<div class="wrapper">
    <form enctype="multipart/form-data" method="POST" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <ul class="cols block">
            <li>
                <label>Имя<br>
                    <input type="text" name="user_firstname">
                </label>
            </li>
            <li>
                <label>Фамилия<br>
                    <input type="text" name="user_lastname">
                </label>
            </li>
            <li>
                <label>Email<br>
                    <input type="email" name="user_email">
                </label>
            </li>
            <li>
                <label>Пароль<br>
                    <input type="password" name="user_password">
                </label>
            </li>
            <li>
                <label>Аватар 70 x 70<br>
                    <input type="file" name="user_cover_address">
                </label>
            </li>
            <li>
                <input type="submit" value="Зарегистрироваться">
            </li>
        </ul>
    </form>
</div>