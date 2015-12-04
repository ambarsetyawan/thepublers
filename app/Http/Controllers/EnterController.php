<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;


class EnterController extends Controller
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        return view('user.login');
    }


    public function enter(Request $request)
    {
        $auth = $this->auth->attempt(['user_email' => $request->user_email, 'password' => $request->user_password], true);
        if(!$auth){
            return redirect('/login')->withErrors('Проверьте правильность ввода данных');
        }else{
            return redirect('/');
        }

    }
}
