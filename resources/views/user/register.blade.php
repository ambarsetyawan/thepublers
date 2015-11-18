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
            @endif
        </ul>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label for="user_cover_address">Обложка:<br>
            <input type="file" name="user_cover_address">
        </label><br>

        <label for="user_firstname">Имя:<br>
            <input type="text" name="user_firstname" value="{{ old('user_firstname') }}">
        </label><br>

        <label for="user_lastname">Фамилия:<br>
            <input type="text" name="user_lastname" value="{{ old('user_lastname') }}">
        </label><br>

        <label for="user_password">Пароль:<br>
            <input type="text" name="user_password">
        </label><br>

        <label for="user_email">Email:<br>
            <input type="text" name="user_email">
        </label><br>

        <input type="submit" value="Сохранить">
    </form>
</div>