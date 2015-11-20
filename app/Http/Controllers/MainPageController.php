<?php
namespace App\Http\Controllers;

use App\BookModel;
use App\CommentModel;
use App\Http\Requests;
use App\User;
use Illuminate\Database\Eloquent;

class Main extends Controller{

    public function index()
    {
        $reader = User::select('user_id', 'user_cover_address', 'user_firstname', 'user_lastname')
            ->orderBy('user_id', 'desc')
            ->first();


        $book = BookModel::orderBy('book_id', 'desc')
            ->first();


        $comment = CommentModel::orderBy('comment_id', 'desc')
            ->take(3)
            ->get();
        

        return view('welcome', ['reader' => $reader, 'book' => $book, 'comment' => $comment]);
    }
}

?>