<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<a href="/">Главная</a>
<div class="wrapper">
    <div class="book_desc">
        <ul class="cols">
            <li>
                <a href="{{ asset('book/' . $book->book_id . '/edit') }}" class="admin_link">Редактировать
                    книгу</a>
            </li>
            <li>
                <form action="" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Удалить книгу">
                </form>
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
                    <li><span>{{ $book->book_author }}, {{ $book->book_year }}</span></li>
                    <li><span>{{ $book->book_category }}</span></li>
                    <li><span>{{ $book->book_text }}</span></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
