<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">

    @include('header.header')

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
                        @endif
                    </li>
                </ul>
            </li>
            <li class="blank"></li>
            <li>
                @if(!is_null($book))
                    <a href="/book/{{ $book->book_id }}" class="book_title">{{ $book->book_title }}</a>
                    <a href="/book/{{ $book->book_id }}"><img src="/{{ $book->book_cover }}"
                                                              alt="{{ $book->book_title }}"
                                                              title="{{ $book->book_title }}"></a>
                @endif
            </li>
            <li class="blank"></li>
            <li>
                <div class="feedback">
                    <ul class="cols">
                        @foreach($comment as $feedback)
                            @if($feedback->comment_id)
                                <li>
                                    <ul class="cols">
                                        <li><img src="/{{ $feedback->user_cover_address }}"
                                                 alt="{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}"
                                                 title="{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}">
                                        </li>
                                        <li>
                                            <a href="/user/{{ $feedback->user_id }}">{{ $feedback->user_firstname }} {{ $feedback->user_lastname }}</a><br>
                                            <span>Рейтинг: {{ $feedback->comment_rating }}</span><br>
                                            <a href="/book/{{ $feedback->comment_book_id }}"
                                               class="comment_text">{{ str_limit($feedback->comment_text, 100) }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>