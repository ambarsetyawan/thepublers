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
        <a href="/quote/{{ $quote->quote_id }}">Посмотреть цитату</a>
        <h3>Редактировать цитату</h3>
        <form action="/quote/{{ $quote->quote_id }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            <ul class="cols">
                <li>
                    <label for="quote_author">Инициалы автора:
                        <input type="text" name="quote_author" value="{{ $quote->quote_author }}">
                    </label>
                </li>
                <li>
                    <label for="quote_text">Password:
                        <textarea name="quote_text" id="" cols="30" rows="10">{{ $quote->quote_text }}</textarea>
                    </label>
                </li>
                <li>
                    <input type="submit" value="Добавить цитату">
                </li>
            </ul>
        </form>
    </div>
</div>