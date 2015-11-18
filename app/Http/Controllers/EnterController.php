<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;


class EnterController extends Controller
{

    public function index()
    {
        return view('user.login');
    }


    public function enter(Request $request)
    {
        if(Auth::attempt(['user_email' => $request->user_email, 'password' => $request->user_password], true))
        {
            echo Auth::user()->user_firstname;
        }else{
            echo redirect('/');
        }
    }
}
