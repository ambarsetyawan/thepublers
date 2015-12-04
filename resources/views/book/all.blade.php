<!doctype html>
<html lang="en">
<head>
    <title>the Publers</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">
    @include('header.header')
    <div class="container">
        <ul class="cols">
            <?php $count = 0; ?>
            <li class="tr">
            @foreach ($all as $book)
                <?php ++$count; ?>
            @if($count % 5 == 0)
            </li>
            <li class="tr">
            <li>
                <img src="/{{ $book->book_cover }}" alt="{{ $book->book_title }}"
                     title="{{ $book->book_title }}"
                     width="200"><br>
                <a href="/book/{{ $book->slug }}">{{ $book->book_title }}</a>
            </li>
            @else
                <li>
                    <img src="/{{ $book->book_cover }}" alt="{{ $book->book_title }}"
                         title="{{ $book->book_title }}"
                         width="200"><br>
                    <a href="/book/{{ $book->slug }}">{{ $book->book_title }}</a>
                </li>
            @endif
            @endforeach
        </ul>
        <div class="page">
            {!! $all->render() !!}
        </div>
    </div>
</div>