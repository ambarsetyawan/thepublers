<!doctype html>
<html lang="en">
<head>
    <title>the Publers — авторизация</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="login">
        <h3>Авторизация</h3>
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
    @include('footer.footer')
</div>