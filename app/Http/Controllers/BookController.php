<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\BookModel;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        return view('book.create');
    }


    public function create()
    {

    }


    public function store(Request $request, BookRequest $rules)
    {
        $this->validate($request, $rules->rules());

        $book_cover = Image::make($request->file('book_cover'))
            ->resizeCanvas(450, 650)
            ->save('content/book_cover/' . time() . '.' . $request->file('book_cover')->getClientOriginalExtension());

        $book = new BookModel($request->all());
        $book->book_cover = $book_cover->basePath();
        $book->save();

        return Redirect::to('/');
    }


    public function show($id)
    {
        $book = BookModel::where('book_id', $id)
            ->first();

        if(is_null($book)){
            return Redirect::to('/');
        }

        return view('book.show', ['book' => $book]);
    }


    public function edit($id)
    {
        $book_edit = BookModel::where('book_id', $id)->first();
        if(is_null($book_edit)){
            return Redirect::to('/');
        }

        return view('book.edit', ['book_edit' => $book_edit]);
    }


    public function update(Request $request, BookRequest $rules, $id)
    {

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


    public function destroy($id)
    {
        $remove_cover_from_disk = BookModel::select('book_cover')->where('book_id', $id)->first();
        File::delete(public_path($remove_cover_from_disk->book_cover));

        $remove = BookModel::where('book_id', $id)->first();
        $remove->delete();

        return Redirect::to('/');
    }
}