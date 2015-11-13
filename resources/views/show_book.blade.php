<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">
    <div class="book_desc">
        <a href="">Редактировать книгу</a>

        <form action="" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Удалить книгу">
        </form>

        <ul class="cols">
            @foreach($book as $content)
                <li>
                    <img src="/{{ $content->book_cover }}" alt="{{ $content->book_title }}"
                         title="{{ $content->book_title }}">
                </li>
                <li class="blank"></li>
                <li>
                    <ul class="cols">
                        <li><h3>{{ $content->book_title }}</h3></li>
                        <li><span>{{ $content->book_author }}, {{ $content->book_year }}</span></li>
                        <li><span>{{ $content->book_category }}</span></li>
                        <li><span>{{ $content->book_text }}</span></li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
