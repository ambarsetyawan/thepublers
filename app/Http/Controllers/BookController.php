<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\BookModel;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;

class BookController extends Controller {
    public function index() {
        return view('book');
    }


    public function create() {

    }


    public function store(Request $request, BookRequest $rules, BookModel $book) {

        $this->validate($request, $rules->rules());

        $book_cover = Image::make($request->file('book_cover'))
            ->resizeCanvas(450, 650)
            ->save('content/book_cover/' . time() . '.' . $request->file('book_cover')->getClientOriginalExtension());

        $book->book_cover = $book_cover->basePath();
        $book->book_author = $request->book_author;
        $book->book_title = $request->book_title;
        $book->book_year = $request->book_year;
        $book->book_category = $request->book_category;
        $book->book_text = $request->book_text;
        $book->save();
    }


    public function show($id) {
        $book = BookModel::where('book_id', $id)
            ->orderBy('book_id', 'desc')
            ->get();

        $check_book_id = BookModel::where('book_id', $id)->first();

        if (is_null($check_book_id)) {
            return Redirect::to('/');
        }

        return view('show_book', ['book' => $book]);
    }


    public function edit($id)
    {
        $edit = BookModel::where('book_id', $id)->get();
        return view('edit_book', ['edit' => $edit]);
    }


    public function update(Request $request, BookRequest $rules, $id) {

        $this->validate($request, $rules->rules());

        $book_cover = Image::make($request->file('book_cover'))
            ->resizeCanvas(450, 650)
            ->save('content/book_cover/' . time() . '.' . $request->file('book_cover')->getClientOriginalExtension());

        BookModel::where('book_id', $id)
            ->update(
                [
                    'book_cover' => $book_cover->basePath(),
                    'book_author' => $request->book_author,
                    'book_title' => $request->book_title,
                    'book_year' => $request->book_year,
                    'book_category' => $request->book_category,
                    'book_text' => $request->book_text,
                ]
            );

        return Redirect::to('/');
    }


    public function destroy(BookModel $model, $id) {
        $remove = BookModel::where('book_id', $id)->first();
        $remove->delete();
        return Redirect::to('/');
    }
}