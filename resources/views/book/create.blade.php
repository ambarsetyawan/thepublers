@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<a href="{{'/'}}">Главная</a>
<a href="{{'/book'}}">Новая книга</a>
<a href="{{'/login'}}">Вход</a>
<a href="{{'/register'}}">Регистрация</a>


<div class="wrapper">
    {!! Form::open(['method' => 'post', 'files'=> true]) !!}
    {!! Form::label('book_cover', 'Обложка книги:') !!}<br>
    {!! Form::file('book_cover') !!}<br>

    {!! Form::label('book_title', 'Название книги:') !!}<br>
    {!! Form::text('book_title') !!}<br>

    {!! Form::label('book_author', 'Автор книги:') !!}<br>
    {!! Form::text('book_author') !!}<br>

    {!! Form::label('book_year', 'Год издания:') !!}<br>
    {!! Form::text('book_year') !!}<br>

    {!! Form::label('book_category', 'Выбрать категорию:') !!}<br>
    {!! Form::select('book_category',
                                ['Художественная литература' => 'Художественная литература',
                                'Детская литература' => 'Детская литература',
                                'Бизнес-литература' => 'Бизнес-литература',
                                'Обучение и наука' => 'Обучение и наука',
                                'Увлечения' => 'Увлечения',
                                'Компьютеры и Интернет' => 'Компьютеры и Интернет',
                                ]) !!}<br>

    {!! Form::label('book_text', 'Информация:') !!}<br>
    {!! Form::textarea('book_text') !!}<br>

    {!! Form::submit('Добавить') !!}<br>
    {!! Form::close() !!}
</div>