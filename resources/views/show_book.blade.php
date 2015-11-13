<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">
    <div class="book_desc">
        @foreach($book as $content)
            <a href="{{ asset('book/' . $content->book_id . '/edit') }}">Редактировать книгу</a>
            <a href="{{ action('BookController@destroy', ['book_id' => $content->book_id])}}">Удалить книгу</a>
            <ul class="cols">
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
