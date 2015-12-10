<!doctype html>
<html lang="en">
<head>
    <title>the Publers — {{ $book_edit->book_title }} / Редактировать</title>
    @include('header.top')
</head>
<body>

<div class="wrapper">

    @include('header.header')

    <form action="/book/{{ $book_edit->slug }}" method="POST" enctype="multipart/form-data">
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
                @foreach($category as $content)
                    <option value="{{ $content->slug }}">{{ $content->category_name }}</option>
                @endforeach
            </select>
        </label>

        <label for="book_text">Информация:
            <textarea name="book_text" id="" cols="30" rows="10">{{ $book_edit->book_text }}</textarea>
        </label>

        <input type="submit" value="Сохранить">
    </form>

    @include('footer.footer')
</div>