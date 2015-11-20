<?php

namespace App\Http\Controllers;

use App\CommentModel;
use App\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        $user = $this->auth->user();
        return view('comment.create', ['user' => $user]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request, CommentModel $comment, CommentRequest $rules)
    {

        $this->validate($request, $rules->rules());

        $comment_user = User::select('user_id')
            ->where('user_email', $this->auth->user()->user_email)
            ->first();

        $comment->comment_post_id = $request->route()->parameter('book');
        $comment->comment_author = $comment_user->user_id;
        $comment->comment_rating = $request->input('comment_rating');
        $comment->comment_text = $request->input('comment_text');
        $comment->save();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
