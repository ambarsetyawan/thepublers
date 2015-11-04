<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
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
            'user_firstname.required' => 'Имя должно быть заполнено и быть больше 3 символов',
            'user_lastname.required'  => 'Фамилия должна быть заполнена и быть больше 3 символов',
            'user_email.required'  => 'Email указан не верно, или пользователь с таким email существует',
            'user_password.required'  => 'Пароль должен быть заполнен и быть больше 3 символов',
            'user_cover_address.required'  => 'Обложка должна быть в формате: jpeg, jpg, png, gif',
        ];
    }
}
