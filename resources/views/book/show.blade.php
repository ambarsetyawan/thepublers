<!doctype html>
<html lang="en">
<head>
    <title>the Publers</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="book_desc">
        <ul class="cols">
            <li>
                @if(Entrust::hasRole('admin'))
                    <a href="{{ asset('book/' . $book->slug . '/edit') }}" class="admin_link">Редактировать
                        книгу</a>
                @endif
            </li>
            <li>
                @if(Entrust::hasRole('admin'))
                    <form action="" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Удалить книгу">
                    </form>
                @endif
            </li>
        </ul>
        <ul class="cols">
            <li>
                <img src="/{{ $book->book_cover }}" alt="{{ $book->book_title }}"
                     title="{{ $book->book_title }}">
            </li>
            <li class="blank"></li>
            <li>
                <ul class="cols">
                    <li><h3>{{ $book->book_title }}</h3></li>
                    <li><span>Автор:</span> <a href="">{{ $book->book_author }}</a></li>
                    <li><span>Год издания:</span> {{ $book->book_year }}</li>
                    <li><span>Категория: </span><a href="/category/{{ $category->slug }}">{{ $category->category_name }}</a></li>
                    <li><span>Описание: {{ $book->book_text }}</span></li>
                </ul>
                <br><br>

                <div class="feedback">
                    @if($count != 0)
                        <h4>Отзывов: {{ $count }}</h4>
                        <a href="{{ Request::url() }}/comment">Добавить комментарий</a>
                    @else
                        <h4>Отзывов к данной книге нет</h4>
                        <a href="{{ Request::url() }}/comment">Добавить комментарий</a>
                    @endif
                    <br><br>
                    <ul class="cols">
                        @foreach($comment as $feedback)
                            <li>

                                <ul class="cols">
                                    <li><img src="/{{ $feedback->user_cover_address }}"
                                             alt="{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}"
                                             title="{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}">
                                    </li>
                                    <li>
                                        <a href="/user/{{ $feedback->user_id }}">{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}</a><br>
                                        <span>Рейтинг: {{ $feedback->comment_rating }}</span><br>
                                        {{ $feedback->comment_text }}
                                    </li>
                                    <li>
                                        @if(Entrust::hasRole('admin'))
                                            <form action="/book/{{ $feedback->slug }}/comment/{{ $feedback->comment_id }}"
                                                  method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" value="Удалить">
                                            </form>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
