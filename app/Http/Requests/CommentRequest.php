<?php

namespace App\Http\Requests;


class CommentRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function message()
    {

    }


    public function rules()
    {
        return [
            'comment_text' => 'required|min:5'
        ];
    }
}
