<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">
    @include('header.header')
    <div class="search">
        <form action="/search" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="search">
                <input type="search" name="search" placeholder="Поиск по книгам">
            </label>
        </form>
    </div>
    <div class="wrapper">
        <div class="search_result">
            <ul class="cols">
                <li>
                    @if(!is_null($search))
                        <img src="/{{ $search->book_cover }}" alt="{{ $search->book_title }}"
                             title="{{ $search->book_title }}" width="200"><br>
                        <a href="/book/{{ $search->book_id }}">{{ $search->book_title }}</a>
                    @else
                        <h3>Ничего не найдено</h3>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
