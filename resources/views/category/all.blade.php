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
        <a href="{{ '/category' }}">Добавить категорию</a>
        <h3>Все категории</h3><br><br>
        @foreach($category as $content)
            <ul class="cols">
                <li>
                    {{ $content->category_name  }}
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
</div>