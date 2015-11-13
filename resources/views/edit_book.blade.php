@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

<div class="wrapper">
    @foreach($edit as $edit_book)
        {!! Form::model($edit_book, ['method' => 'PATCH', 'route' => ['book.update', $edit_book->book_id], 'files' => true]) !!}
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="book_cover">Обложка книги:<br>
            <input type="file" name="book_cover" value="{{ $edit_book->book_cover }}">
        </label><br>

        <label for="book_title">Название книги:<br>
            <input type="text" name="book_title" value="{{ $edit_book->book_title }}">
        </label><br>


        <label for="book_author">Автор книги:<br>
            <input type="text" name="book_author" value="{{ $edit_book->book_author }}">
        </label><br>

        <label for="book_year">Год издания:<br>
            <input type="text" name="book_year" value="{{ $edit_book->book_year }}">
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
            <textarea name="book_text" id="" cols="30" rows="10">{{ $edit_book->book_text }}</textarea>
        </label><br>
    @endforeach

    <input type="submit" value="Сохранить">
    {{--</form>--}}
    {!! Form::close() !!}
</div>