<!doctype html>
<html lang="en">
<head>
    <title>the Publers — все цитаты</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <a href="/quote">Создать цитату</a>
    <h3>Все цитаты</h3>
    @foreach($quote as $content)
        <ul class="cols quote">
            <li>{{ $content->quote_text }}</li>
            <li>{{ $content->quote_author }}</li>
            <li><a href="/quote/{{ $content->quote_id }}/edit">Редактировать</a></li>
            <li>
                <form action="/quote/{{ $content->quote_id }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Удалить">
                </form>
            </li>
        </ul>
    @endforeach
    @include('footer.footer')
</div>