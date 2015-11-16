<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user_cover_address' => 'required|image|mimes:jpeg,jpg,png,gif',
            'user_firstname' => 'required|min:3|max:32',
            'user_lastname' => 'required|min:3|max:32',
            'user_password' => 'required|min:3|max:32',
        ];
    }
}
