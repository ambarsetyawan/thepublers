<?php
namespace App\Http\Controllers;

use App\BookModel;
use App\Http\Requests;
use App\UserModel;
use Illuminate\Database\Eloquent;

class Main extends Controller{
    public function index()
    {
        $reader = UserModel::select('user_id', 'user_cover_address', 'user_firstname', 'user_lastname')
            ->orderBy('user_id', 'desc')
            ->first();


        $book = BookModel::orderBy('book_id', 'desc')
            ->first();

        return view('welcome', ['reader' => $reader, 'book' => $book]);
    }
}

?>