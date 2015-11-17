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
        Auth::attempt(['user_email' => $request->user_email, 'password' => $request->user_password], true);

        if (Auth::check()) {
            echo "Now I'm logged in as " . Auth::user()->user_firstname;
        } else {
            echo "I'm still NOT logged in<br />";
        }
    }
}
