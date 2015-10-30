<?php

namespace App\Http\Controllers;

use Hash;
use App\UserModel;
use App\Http\Requests\SignupRequest;
use App\Http\Requests;


class SignupController extends Controller {

    public function index() {
        return view('signup');
    }

    public function store(SignupRequest $request) {
        $model = new UserModel();
        $model->user_firstname = $request->user_firstname;
        $model->user_lastname = $request->user_lastname;
        $model->user_email = $request->user_email;
        $model->user_password = Hash::make($request->user_password);
        $model->user_cover_address = $request->user_cover_address;
        $model->save();
    }
}
