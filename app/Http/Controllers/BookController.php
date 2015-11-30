<?php

namespace App\Http\Controllers;

use App\CommentModel;
use App\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\BookModel;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use Illuminate\Support\Facades\File;


class BookController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('book.auth', ['except' => ['show']]);
        $this->middleware('book.find', ['only' => ['show', 'edit']]);
    }


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
        $book->book_user_id = $this->auth->id();
        $book->save();

        return Redirect::to('/');
    }


    public function show($id)
    {
        $book = BookModel::find($id);
        $count = CommentModel::where('comment_book_id', $id)->count();
        $get_user = BookModel::where('book_user_id', $this->auth->id())->first();

        $comment = CommentModel::leftJoin('user', 'user.user_id', '=', 'comment.comment_user_id')
            ->leftJoin('book', 'book.book_id', '=', 'comment.comment_book_id')
            ->where('book.book_id', $id)
            ->get();

        return view('book.show', ['book' => $book, 'count' => $count, 'comment' => $comment, 'get_user' => $get_user]);
    }



    public function remove_comment($id, $comment_book_id)
    {
        CommentModel::leftJoin('user', 'user.user_id', '=', 'comment.comment_user_id')
            ->leftJoin('book', 'book.book_id', '=', 'comment.comment_book_id')
            ->where('book.book_id', $id)
            ->where('comment.comment_book_id', $comment_book_id)
            ->first()
            ->delete();

        return redirect()->back();
    }



    public function edit($id)
    {
        $book_edit = BookModel::find($id);
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

        BookModel::where('book_id', $id)->first()->delete();

        return Redirect::to('/');
    }

}