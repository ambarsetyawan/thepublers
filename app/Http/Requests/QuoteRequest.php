<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuoteRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quote_author' => 'required|min:3|max:32',
            'quote_text' => 'required|min:3|max:128',
        ];
    }

    public function message()
    {
        return [
            'quote_author' => 'sdfsd',
        ];
    }
}
