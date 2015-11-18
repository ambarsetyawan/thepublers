<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">
    <div class="errors">
        <ul class="cols">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="header">
        <ul class="cols">
            @if(Auth::check())
                <li><a href="{{'/'}}">Главная</a></li>
                <li><a href="{{'/book'}}">Новая книга</a></li>
                <li><a href="{{ '/user/' . Auth::user()->user_id }}">Профиль</a></li>
                <li><a href="{{ '/logout' }}">Выход</a></li>
            @else
                <li><a href="{{'/login'}}">Вход</a></li>
                <li><a href="{{'/user'}}">Регистрация</a></li>
        </ul>
    </div>
    <div class="login">
        <form action="/login" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

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
                    <input type="submit" value="Войти">
                </li>
            </ul>
        </form>
    </div>
</div>
@endif