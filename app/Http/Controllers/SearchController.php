<?php

namespace App\Http\Controllers;

use App\BookModel;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search_book = BookModel::search($request->input('search'))->get();
        return view('search.search', ['search_book' => $search_book]);
    }
}