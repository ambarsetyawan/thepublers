<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\PostModel;

class PostController extends Controller
{
    public function index() {
        return view('post');
    }

    public function create() {
        //
    }

    public function store(PostRequest $request) {
        $model = new PostModel();

    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}