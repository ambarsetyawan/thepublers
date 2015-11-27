<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">

    @include('header.header')

    <div class="errors">
        <ul class="cols">
            @foreach($errors->all() as $error)
                <li><span>{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label for="user_cover_address">Обложка:
            <input type="file" name="user_cover_address">
        </label>

        <label for="user_firstname">Имя:
            <input type="text" name="user_firstname" value="{{ old('user_firstname') }}">
        </label>

        <label for="user_lastname">Фамилия:
            <input type="text" name="user_lastname" value="{{ old('user_lastname') }}">
        </label>

        <label for="user_password">Пароль:
            <input type="password" name="user_password">
        </label>

        <label for="user_email">Email:
            <input type="email" name="user_email">
        </label>

        <input type="submit" value="Сохранить">
    </form>
</div>