<!doctype html>
<html lang="en">
<head>
    <title>the Publers</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="start">
        <ul class="cols">
            <li>
                <h3>Новый читатель</h3>
                @if(!is_null($reader))
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
                @endif
                <div class="quotes">
                    <h3>Цитаты писателей</h3>
                    @if(Entrust::hasRole('admin'))
                        <small><a href="/quote">Создать</a></small>,
                    @endif
                    @if(!is_null($quote))
                        @if(Entrust::hasRole('admin'))
                            <small><a href="/quote/{{ $quote->quote_id }}/edit">Редактировать</a></small><br>
                        @endif
                        <ul class="cols">
                            <li>
                                <span>{{ $quote->quote_author }}</span><br>
                                <i>{{ $quote->quote_text }}</i>
                            </li>
                        </ul>
                        <img src="/img/quote.png" alt="">
                    @endif
                </div>
            </li>
            <li class="blank"></li>
            <li>
                <h3>Новинка</h3>
                @if(!is_null($book))
                    <a href="/book/{{ $book->slug }}" class="book_title">{{ $book->book_title }}</a>
                    <a href="/book/{{ $book->slug }}"><img src="/{{ $book->book_cover }}"
                                                              alt="{{ $book->book_title }}"
                                                              title="{{ $book->book_title }}"></a>
                @endif
            </li>
            <li class="blank"></li>
            <li>
                <h3>Отзывы</h3>

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
    <div class="last_book">
        <h3>Новые издания</h3>
        <table>
            <tr>
                @foreach($latest_book as $latest)
                    <td>
                        <a href="/book/{{ $latest->slug }}"><img src="/{{ $latest->book_cover }}" alt="{{ $latest->book_title }}"
                                 title="{{ $latest->book_title }}" width="200"
                                 height="auto"><br>{{ $latest->book_title }}
                        </a>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
    @include('footer.footer')
</div>