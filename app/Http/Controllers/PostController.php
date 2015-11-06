<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\PostModel;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function index() {
        $post_category = ['news' => 'Новости', 'auto' => 'Авто'];
        return view('post', ['post_category' => $post_category]);
    }

    public function create() {

    }

    public function store(Request $request)
    {

        $rules = new PostRequest();
        $this->validate($request, $rules->rules());

        $post_cover = Image::make($request->file('post_cover'))
            ->resizeCanvas(600, null)
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
        $post = PostModel::where('post_id', $id);
        return view('show_post', ['post' => $post]);
    }

    public function edit($id) {
        $edit_post = PostModel::where('post_id', $id)->first();
        return view('edit_post', ['edit_post' => $edit_post]);
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}