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
            'user_cover_address' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'user_firstname.required' => 'A user_firstname is required',
            'user_lastname.required'  => 'A user_lastname is required',
            'user_email.required'  => 'A user_email is required or exist in db',
            'user_password.required'  => 'A user_password is required and over 3 symbol',
            'user_cover_address.required'  => 'A user_cover_address is required',
        ];
    }
}
