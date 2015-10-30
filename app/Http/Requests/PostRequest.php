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
            'news_cover' => 'required|image|mimes:jpeg,jpg,png,gif',
            'news_title' => 'required|max:128',
            'news_preview' => 'required|max:128',
            'news_content' => 'required',
        ];
    }
}
