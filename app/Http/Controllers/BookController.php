<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\CommentModel;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\BookModel;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use Illuminate\Support\Facades\File;
use Post;
use Carbon\Carbon;

class BookController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('book.auth', ['except' => ['slug']]);
    }


    public function index()
    {
        $category = CategoryModel::all();
        return view('book.create', ['category' => $category]);
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


    public function slug($slug)
    {
        $book = BookModel::where('slug', $slug)->first();
        $count = CommentModel::where('comment_book_id', $book->book_id)->count();
        $user = BookModel::where('book_user_id', $this->auth->id())->first();
        $category = CategoryModel::where('slug', $book->book_category)->first();

        $comment = CommentModel::leftJoin('user', 'user.user_id', '=', 'comment.comment_user_id')
            ->leftJoin('book', 'book.book_id', '=', 'comment.comment_book_id')
            ->where('book.book_id', $book->book_id)
            ->get();

        return view('book.show', ['category' => $category, 'book' => $book, 'count' => $count, 'comment' => $comment, 'user' => $user]);
    }


    public function remove_comment($slug, $comment_book_id)
    {
        $book = BookModel::where('slug', $slug)->first();

        CommentModel::leftJoin('user', 'user.user_id', '=', 'comment.comment_user_id')
            ->leftJoin('book', 'book.book_id', '=', 'comment.comment_book_id')
            ->where('book.book_id', $book->book_id)
            ->where('comment.comment_book_id', $comment_book_id)
            ->first()
            ->delete();

        return redirect()->back();
    }


    public function edit($slug)
    {
        $book = BookModel::where('slug', $slug)->first();
        $book_edit = BookModel::find($book->book_id);
        $category = CategoryModel::all();
        return view('book.edit', ['book_edit' => $book_edit, 'category' => $category]);
    }


    public function update(Request $request, BookRequest $rules, $slug)
    {
        $book = BookModel::where('slug', $slug)->first();
        $this->validate($request, $rules->rules());

        $book_cover = Image::make($request->file('book_cover'))
            ->resizeCanvas(450, 650)
            ->save('content/book_cover/' . time() . '.' . $request->file('book_cover')->getClientOriginalExtension());

        BookModel::where('book_id', $book->book_id)
            ->update(
                [
                    'book_cover' => $book_cover->basePath(),
                    'book_author' => $request->book_author,
                    'book_title' => $request->book_title,
                    'book_year' => $request->book_year,
                    'book_category' => $request->book_category,
                    'book_text' => $request->book_text,
                    'updated_at' => Carbon::now('Europe/Minsk'),
                ]
            );

        return Redirect::to('/');
    }


    public function destroy($slug)
    {
        $book = BookModel::where('slug', $slug)->first();
        $remove_cover_from_disk = BookModel::select('book_cover')->where('book_id', $book->book_id)->first();
        File::delete(public_path($remove_cover_from_disk->book_cover));

        BookModel::where('book_id', $book->book_id)->first()->delete();

        return Redirect::to('/');
    }


    public function all()
    {
        $all = BookModel::paginate(8);
        return view('book.all', ['all' => $all]);
    }

}