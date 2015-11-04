<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\PostModel;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function index() {
        return view('post');
    }

    public function create() {

    }

    public function store(Request $request)
    {

        $rules = new PostRequest();
        $this->validate($request, $rules->rules());

        $post_cover = Image::make($request->file('post_cover'))
            ->fit(600, null)
            ->save('content/post_cover/' . time() . '.' . $request->file('post_cover')->getClientOriginalExtension());

        $post = new PostModel();
        $post->post_cover = $post_cover->basePath();
        $post->post_author = '444';
        $post->post_title = $request->post_title;
        $post->post_category = $request->post_category;
        $post->post_preview = $request->post_preview;
        $post->post_text = $request->post_text;
        $post->save();
    }

    public function show($id) {
        return view('show_post');
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