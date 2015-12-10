<!doctype html>
<html lang="en">
<head>
    <title>the Publers — регистрация</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <h3>Регистрация</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

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
    @include('footer.footer')
</div>