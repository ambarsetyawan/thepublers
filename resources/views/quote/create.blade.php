<!doctype html>
<html lang="en">
<head>
    <title>the Publers</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="login">
        <h3>Создать цитату</h3>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <ul class="cols">
                <li>
                    <label for="quote_author">Инициалы автора:
                        <input type="text" name="quote_author" value="{{ old('quote_author') }}">
                    </label>
                </li>
                <li>
                    <label for="quote_text">Password:
                        <textarea name="quote_text" id="" cols="30" rows="10">{{ old('quote_text') }}</textarea>
                    </label>
                </li>
                <li>
                    <input type="submit" value="Добавить цитату">
                </li>
            </ul>
        </form>
    </div>
</div>