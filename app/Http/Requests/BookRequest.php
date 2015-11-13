<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'book_cover' => 'required|image|mimes:jpeg,jpg,png,gif',
            'book_author' => 'required|min:3|max:64',
            'book_title' => 'required|min:3|max:128',
            'book_year' => 'required|integer',
            'book_category' => 'required',
            'book_text' => 'required|min:3',
        ];

    }

    public function message()
    {

    }

}
