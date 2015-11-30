<link rel="stylesheet" href="{{ asset("css/css.css") }}">

<div class="wrapper">

    @include('header.header')

    <form action="/book/{{ $book_edit->book_id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="book_cover">Обложка книги:
            <input type="file" name="book_cover" value="{{ $book_edit->book_cover }}">
        </label>

        <label for="book_title">Название книги:
            <input type="text" name="book_title" value="{{ $book_edit->book_title }}">
        </label>


        <label for="book_author">Автор книги:
            <input type="text" name="book_author" value="{{ $book_edit->book_author }}">
        </label>

        <label for="book_year">Год издания:
            <input type="text" name="book_year" value="{{ $book_edit->book_year }}">
        </label>

        <label for="book_category">Выбрать категорию:
            <select name="book_category" id="">
                <option value="Художественная литература">Художественная литература</option>
                <option value="Детская литература">Детская литература</option>
                <option value="Бизнес-литература">Бизнес-литература</option>
                <option value="Обучение и наука">Обучение и наука</option>
                <option value="Увлечения">Увлечения</option>
                <option value="Компьютеры и Интернет">Компьютеры и Интернет</option>
            </select>
        </label>

        <label for="book_text">Информация:
            <textarea name="book_text" id="" cols="30" rows="10">{{ $book_edit->book_text }}</textarea>
        </label>

        <input type="submit" value="Сохранить">
    </form>
</div>