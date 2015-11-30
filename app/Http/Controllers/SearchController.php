<?php
namespace App\Http\Controllers;


use App\BookModel;
use Illuminate\Http\Request;
use App\Http\Requests;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = BookModel::where('book_title',  'LIKE', '%'.$request->input('search').'%')->first();
        return view('search.search', ['search' => $search]);
    }
}