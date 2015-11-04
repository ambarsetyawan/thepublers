<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\Http\Requests;
use App\Http\Requests\SignupRequest;
use Intervention\Image\ImageManagerStatic as Image;

class SignupController extends Controller
{


    function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('signup');
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $rules = new SignupRequest();
        $this->validate($request, $rules->rules());

        $user_cover = Image::make($request->file('user_cover_address'))
            ->fit(150, 150)
            ->save('content/user_cover/' . time() . '.' . $request->file('user_cover_address')->getClientOriginalExtension());

        $user = new UserModel();
        $user->user_firstname = $request->user_firstname;
        $user->user_lastname = $request->user_lastname;
        $user->user_email = $request->user_email;
        $user->user_password = $request->user_password;
        $user->user_cover_address = $user_cover->basePath();
        $user->save();
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
