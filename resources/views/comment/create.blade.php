<!doctype html>
<html lang="en">
<head>
    <title>the Publers</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">

    @include('header.header')

    <div class="comment">
        <h3>Добавить отзыв</h3>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <ul class="cols">
                <li>
                    <label for="comment_rating">Оценка:
                        <select name="comment_rating" id="">
                            @for($i = 1; $i < 6; ++$i)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                </li>
                <li>
                    <label for="comment_text">Отзыв:
                        <textarea name="comment_text" id="" cols="30" rows="10"></textarea>
                    </label>
                </li>
                <li>
                    <input type="submit" value="Добавить отзыв">
                </li>
            </ul>
        </form>
    </div>
</div>

