<!doctype html>
<html lang="en">
<head>
    <title>the Publers — просмотр цитат</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="quote_show">
        <a href="/quote/all">Посмотреть цитаты</a>
        <h3>Цитата</h3>
        <ul class="cols">
            <li>
                <h4>Автор</h4>
            </li>
            <li>
                <h4>Цитата</h4>
            </li>
            <li>
            </li>
        </ul>
        <br clear="all">
        @foreach($quote as $content)
            <ul class="cols">
                <li>{{ $content->quote_author }}</li>
                <li>{{ $content->quote_text }}</li>
                <li>
                    <form action="/quote/{{ $content->quote_id }}/" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Удалить">
                    </form>
                </li>
            </ul>
        @endforeach
    </div>
    @include('footer.footer')
</div>