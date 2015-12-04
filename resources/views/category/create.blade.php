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
        <h3>Добавить категорию</h3>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <ul class="cols">
                <li>
                    <label for="category_name">Название категории:
                        <input type="text" name="category_name" value="{{ old('category_name') }}">
                    </label>
                </li>
                <li>
                    <input type="submit" value="Добавить категорию">
                </li>
            </ul>
        </form>
    </div>
</div>