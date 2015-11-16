<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\Http\Requests;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use File;

class UserController extends Controller
{

    public function index()
    {
        return view('user.signup');
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

        $user = new UserModel($request->all());
        $user->user_password = Hash::make($request->user_password);
        $user->user_cover_address = $user_cover->basePath();
        $user->save();
    }


    public function show($id)
    {
        $get_user = UserModel::where('user_id', $id)->first();
        if(is_null($get_user)){
            return Redirect::to('/');
        }

        return view('user.show', ['get_user' => $get_user]);
    }


    public function edit($id)
    {
        $edit_user = UserModel::where('user_id', $id)->first();
        if(is_null($edit_user)){
            return Redirect::to('/');
        }

        return view('user.edit', ['edit_user' => $edit_user]);
    }


    public function update(Request $request, $id)
    {
        $rules = new UserRequest();
        $this->validate($request, $rules->rules());

        $user_cover = Image::make($request->file('user_cover_address'))
            ->fit(150, 150)
            ->save('content/user_cover/' . time() . '.' . $request->file('user_cover_address')->getClientOriginalExtension());

        UserModel::where('user_id', $id)
            ->update(
                [
                    'user_cover_address' => $user_cover->basePath(),
                    'user_firstname' => $request->user_firstname,
                    'user_lastname' => $request->user_lastname,
                    'user_password' => $request->user_password,
                    'user_icq' => $request->user_icq,
                    'user_skype' => $request->user_skype,
                    'user_about' => $request->user_about,
                ]
            );
    }


    public function destroy($id)
    {
        $user_cover = UserModel::select('user_cover_address')
            ->where('user_id', $id)
            ->first();

        UserModel::where('user_id', $id)->first()->delete();
        File::delete(public_path($user_cover->user_cover_address));
        return Redirect::to('/');
    }
}
