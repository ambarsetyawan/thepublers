<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">
    <div class="errors">
        <ul class="cols">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="header">
        <ul class="cols">
            @if(Auth::check())
                <li><a href="{{'/'}}">Главная</a></li>
                <li><a href="{{'/book'}}">Новая книга</a></li>
                <li><a href="{{ '/user/' . Auth::user()->user_id }}">Профиль</a></li>
                <li><a href="{{ '/logout' }}">Выход</a></li>
            @else
                <li><a href="{{'/login'}}">Вход</a></li>
                <li><a href="{{'/user'}}">Регистрация</a></li>
            @endif
        </ul>
    </div>
    <div class="start">
        <ul class="cols">
            <li>
                <ul class="cols">
                    <li>
                        @if(!is_null($reader))
                            <img src="/{{ $reader->user_cover_address }}"
                                 alt="{{ $reader->user_firstname }} {{ $reader->user_lastname }}"
                                 title="{{ $reader->user_firstname }} {{ $reader->user_lastname }}">
                    </li>
                    <li>
                        <a href="/user/{{ $reader->user_id }}">{{ $reader->user_firstname }} {{ $reader->user_lastname }}</a>
                        @else
                            <h3>Критиков нет, но вы можете <a href="{{'/user'}}">создать</a> нового</h3>
                        @endif
                    </li>
                </ul>
            </li>
            <li>
                @if(!is_null($book))
                    <a href="/book/{{ $book->book_id }}" class="book_title">{{ $book->book_title }}</a>
                    <a href="/book/{{ $book->book_id }}"><img src="/{{ $book->book_cover }}"
                                                              alt="{{ $book->book_title }}"
                                                              title="{{ $book->book_title }}"></a>
                @else
                    <div class="book_start">
                        <h3>Книг нет, но вы можете ее <a href="{{'/book'}}">создать</a></h3>
                    </div>
                @endif
            </li>
            <li>
                <div class="feedback">
                    <ul class="cols">
                        @if($comment)
                            @foreach($comment as $feedback)
                                <li>
                                    <ul class="cols">
                                        <li><a href="">{{ $feedback->comment_author }}</a></li>
                                        <li>{{ $feedback->comment_text }}</li>
                                    </ul>
                                </li>
                            @endforeach
                    </ul>
                    @else
                        <h3>Нет ниодного отзыва к книгам</h3>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>