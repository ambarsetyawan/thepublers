@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<a href="{{'/'}}">Главная</a>
<a href="{{'/book'}}">Новая книга</a>
<a href="{{'/login'}}">Вход</a>
<a href="{{'/register'}}">Регистрация</a>

<div class="wrapper">
    {!! Form::model($book_edit, ['method' => 'PATCH', 'route' => ['book.update', $book_edit->book_id], 'files' => true]) !!}
    <input name="_method" type="hidden" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <label for="book_cover">Обложка книги:<br>
        <input type="file" name="book_cover" value="{{ $book_edit->book_cover }}">
    </label><br>

    <label for="book_title">Название книги:<br>
        <input type="text" name="book_title" value="{{ $book_edit->book_title }}">
    </label><br>


    <label for="book_author">Автор книги:<br>
        <input type="text" name="book_author" value="{{ $book_edit->book_author }}">
    </label><br>

    <label for="book_year">Год издания:<br>
        <input type="text" name="book_year" value="{{ $book_edit->book_year }}">
    </label><br>

    <label for="book_category">Выбрать категорию:<br>
        <select name="book_category" id="">
            <option value="Художественная литература">Художественная литература</option>
            <option value="Детская литература">Детская литература</option>
            <option value="Бизнес-литература">Бизнес-литература</option>
            <option value="Обучение и наука">Обучение и наука</option>
            <option value="Увлечения">Увлечения</option>
            <option value="Компьютеры и Интернет">Компьютеры и Интернет</option>
        </select>
    </label><br>

    <label for="book_text">Информация:<br>
        <textarea name="book_text" id="" cols="30" rows="10">{{ $book_edit->book_text }}</textarea>
    </label><br>

    <input type="submit" value="Сохранить">
    {!! Form::close() !!}
</div>