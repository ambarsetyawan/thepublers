<?php

namespace App\Http\Controllers;

use App\BookModel;
use App\CategoryModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.create');
    }


    public function all()
    {
        $category = CategoryModel::all();
        return view('category.all', ['category' => $category]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $category = new CategoryModel();
        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect()->to('/category/all');
    }


    public function show($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        $sort_book = BookModel::where('book_category', $category->slug)->get();
        return view('category.show', ['sort_book' => $sort_book]);
    }


    public function edit($slug)
    {
        $category = CategoryModel::where('slug', $slug)->first();
        return view('category.edit', ['category' => $category]);
    }


    public function update(Request $request, $slug)
    {
        CategoryModel::where('slug', $slug)
            ->update(
                [
                    'category_name' => $request->input('category_name')
                ]
            );

        return redirect()->to('/category/all');
    }


    public function destroy($slug)
    {
        CategoryModel::where('slug', $slug)->delete();
        return redirect()->to('/category/all');
    }
}
