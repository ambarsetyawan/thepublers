<!doctype html>
<html lang="en">
<head>
    <title>the Publers — Все категории</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="login">
        <a href="{{ '/category' }}">Добавить категорию</a>
        <h3>Все категории</h3>
        @foreach($category as $content)
            <ul class="cols category">
                <li>
                    <span>{{ $content->category_name  }}</span>
                </li>
                <li>
                    <a href="{{ $content->slug  }}/edit">Редактировать</a>
                </li>
                <li>
                    <form action="/category/{{ $content->slug }}" method="post">
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
