<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class SignupRequest extends Request {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'user_firstname' => 'required|min:3|max:32',
            'user_lastname' => 'required|min:3|max:32',
            'user_email' => 'required|email|unique:user,user_email',
            'user_password' => 'required|min:3|max:32',
            'user_cover' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
    }
}
