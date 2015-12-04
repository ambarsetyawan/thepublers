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
        <a href="{{ '/category/all' }}">Все категории</a>
        <h3>Добавить категорию</h3><br><br>
        <form action="/category/{{ $category->slug }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            <ul class="cols">
                <li>
                    <label for="category_name">Название категории:
                        <input type="text" name="category_name" value="{{ $category->category_name }}">
                    </label>
                </li>
                <li>
                    <input type="submit" value="Добавить категорию">
                </li>
            </ul>
        </form>
    </div>
</div>