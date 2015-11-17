<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<a href="{{'/'}}">Главная</a>
<a href="{{'/book'}}">Новая книга</a>
<a href="{{'/login'}}">Вход</a>
<a href="{{'/user'}}">Регистрация</a>

<br><br>


<div class="wrapper">
    <div class="start">
        <ul class="cols">
            <li>
                <ul class="cols">
                    <li>
                        @if(!is_null($reader))
                            <img src="/{{ $reader->user_cover_address }}"
                                 alt="{{ $reader->user_firstname }} {{ $reader->user_lastname }}"
                                 title="{{ $reader->user_firstname }} {{ $reader->user_lastname }}">
                            <br>
                            <a href="/user/{{ $reader->user_id }}">{{ $reader->user_firstname }} {{ $reader->user_lastname }}</a>
                        @else
                            <h3>Критиков нет, но вы можете <a href="{{'/user'}}">создать</a> нового</h3>
                        @endif
                    </li>
                </ul>
            </li>
            <li>
                @if(!is_null($book))
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

            </li>
        </ul>
    </div>
</div>