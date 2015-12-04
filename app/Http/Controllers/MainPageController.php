<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\Http\Requests;
use App\QuoteModel;
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


        $latest_book = BookModel::orderBy('book_id', 'desc')
            ->get()
            ->take(4);

        $comment = User::leftJoin('comment', 'user.user_id', '=', 'comment.comment_user_id')
            ->orderBy('comment.comment_user_id', 'desc')
            ->take(3)
            ->get();

        $quote = QuoteModel::orderBy('quote_id', 'desc')
            ->take(1)
            ->first();

        return view('welcome', ['quote' => $quote, 'latest_book' => $latest_book, 'reader' => $reader, 'book' => $book, 'comment' => $comment]);
    }
}

?>