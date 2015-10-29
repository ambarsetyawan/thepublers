<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Collection;

class ProfileController extends Controller
{
    public function index()
    {

    }



    public function create()
    {

    }



    public function store(Request $request)
    {

    }



    public function show($id)
    {
        $show_profile = UserModel::select('user_firstname', 'user_lastname', 'user_email', 'user_cover_address')
            ->where('user_id', $id)
            ->firstOrFail();

        return $show_profile;
    }



    public function edit($id)
    {
        $edit_profile = UserModel::select('user_firstname', 'user_lastname', 'user_email', 'user_cover_address')
            ->where('user_id', $id)
            ->firstOrFail();

        return $edit_profile;
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
