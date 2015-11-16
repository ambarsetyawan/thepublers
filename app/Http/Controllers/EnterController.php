<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnterController extends Controller
{
    public function index()
    {
        return view('user.login');
    }


    public function enter(Request $request)
    {

    }
}
