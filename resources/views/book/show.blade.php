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
                <li><a href="{{'/'}}">Главная</a></li>
                <li><a href="{{'/login'}}">Вход</a></li>
                <li><a href="{{'/user'}}">Регистрация</a></li>
            @endif
        </ul>
    </div>
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
                    <li><span>Автор:</span> <a href="">{{ $book->book_author }}</a></li>
                    <li><span>Год издания:</span> {{ $book->book_year }}</li>
                    <li><span>Категория:</span> <a href="">{{ $book->book_category }}</a></li>
                    <li><span>Описание: {{ $book->book_text }}</span></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
