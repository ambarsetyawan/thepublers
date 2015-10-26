<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PostController extends Controller {

    public function index(Request $request)
    {
        if($request->has('news_title', 'news_preview', 'news_content')){
            echo true;
        }
        
        return view('post');
    }


    public function create() {
        return 'Создание новости';
    }


    public function store() {

    }


    public function show($id) {
        return 'Показ новости ' . $id;
    }


    public function edit($id) {
        return 'Редактирование новости ' . $id;
    }


    public function update(Request $request, $id) {

    }


    public function destroy($id) {
        return 'Убить новость ' . $id;
    }
}
