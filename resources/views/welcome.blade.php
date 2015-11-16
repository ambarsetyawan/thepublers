<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<a href="{{ asset('user') }}">Регистрация</a>
<a href="{{ asset('book') }}">Новая книга</a>

<br><br>


<div class="wrapper">
    <div class="start">
        <ul class="cols">
            <li>
                <ul class="cols">
                    <li>
                        <img src="/{{ $reader->user_cover_address }}"
                             alt="{{ $reader->user_firstname }} {{ $reader->user_lastname }}"
                             title="{{ $reader->user_firstname }} {{ $reader->user_lastname }}">
                    </li>
                    <li>
                        <a href="/user/{{ $reader->user_id }}">{{ $reader->user_firstname }} {{ $reader->user_lastname }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/book/{{ $book->book_id }}"><img src="/{{ $book->book_cover }}" alt="{{ $book->book_title }}"
                                                          title="{{ $book->book_title }}"></a>

            </li>
        </ul>
    </div>
</div>