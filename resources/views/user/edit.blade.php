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
                <li><a href="{{'/'}}">Главная</a></li>
                <li><a href="{{'/login'}}">Вход</a></li>
                <li><a href="{{'/user'}}">Регистрация</a></li>
            @endif
        </ul>
    </div>
    <form action="/user/{{ $edit_user->user_id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <label for="user_cover_address">Обложка:
            <input type="file" name="user_cover_address" value="{{ $edit_user->user_cover_address }}">
        </label>

        <label for="user_firstname">Имя:
            <input type="text" name="user_firstname" value="{{ $edit_user->user_firstname }}">
        </label>

        <label for="user_lastname">Фамилия:
            <input type="text" name="user_lastname" value="{{ $edit_user->user_lastname }}">
        </label>

        <label for="user_password">Пароль:
            <input type="password" name="user_password">
        </label>

        <label for="user_email">Email:
            <input type="email" name="user_email" disabled value="{{ $edit_user->user_email }}">
        </label>

        <label for="user_icq">ICQ:
            @if($edit_user->user_icq != 0)
                <input type="text" name="user_icq" value="{{ $edit_user->user_icq }}">
            @else
                <input type="text" name="user_icq">
            @endif
        </label>

        <label for="user_skype">Skype:
            @if(!is_null($edit_user->user_skype))
                <input type="text" name="user_skype" value="{{ $edit_user->user_skype }}">
            @else
                <input type="text" name="user_skype">
            @endif
        </label>

        <label for="user_about">О себе:
            @if(!is_null($edit_user->user_about))
                <textarea name="user_about" id="" cols="30" rows="10">{{ $edit_user->user_about }}</textarea>
            @else
                <textarea name="user_about" id="" cols="30" rows="10"></textarea>
            @endif
        </label>

        <input type="submit" value="Сохранить">
    </form>

</div>