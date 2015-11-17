<a href="{{'/'}}">Главная</a>
<a href="{{'/book'}}">Новая книга</a>
<a href="{{'/login'}}">Вход</a>
<a href="{{'/register'}}">Регистрация</a>

<div class="wrapper">
    <form action="/login" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <ul class="cols">
            <li>
                <label for="user_email">Email:
                    <input type="email" name="user_email" value="{{ old('user_email') }}">
                </label>
            </li>
            <li>
                <label for="user_password">Password:
                    <input type="password" name="user_password">
                </label>
            </li>
            <li>
                <label for="remember">
                    <input type="checkbox" name="remember"> Remember Me:
                </label>
            </li>
            <li>
                <input type="submit" value="Войти">
            </li>
        </ul>
    </form>
</div>