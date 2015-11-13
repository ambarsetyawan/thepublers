<?php
namespace App\Http\Controllers;

use App\BookModel;
use App\Http\Requests;
use Illuminate\Database\Eloquent;

class Main extends Controller{
    public function index()
    {
        $book = BookModel::orderBy('book_id', 'desc')
            ->get();
        return view('welcome', ['book' => $book]);
    }
}

?>