<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'post_cover' => 'required|image|mimes:jpeg,jpg,png,gif',
            'post_title' => 'required|min:3|max:128',
            'post_category' => 'required',
            'post_preview' => 'required|min:3|max:128',
            'post_text' => 'required|min:3',
        ];

    }

    public function message()
    {

    }

}
