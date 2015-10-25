<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PostController extends Controller {

    public function index(Request $request) {
        $news_title = $request->input('news_title');
        if ($request->has('news_title')) {
            echo $news_title;
        }

        return view('post');
    }


    public function create() {
        return 'Создание новости';
    }


    public function store(Request $request) {
        $news_title = $request->input('news_title');
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
