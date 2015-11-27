<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use File;
use Hash;


class UserController extends Controller
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['except' => ['index', 'store']]);
        $this->middleware('auth.access', ['only' => ['index']]);
        $this->middleware('check.user.id', ['only' => ['show', 'edit']]);
        $this->middleware('logout', ['only' => ['logout']]);
    }


    public function index()
    {
        return view('user.register');
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

        $user = new User($request->all());
        $user->user_password = Hash::make($request->user_password);
        $user->user_cover_address = $user_cover->basePath();
        $user->save();
    }


    public function show($id)
    {
        $get_user = User::find($id);
        return view('user.show', ['get_user' => $get_user]);
    }


    public function edit($id)
    {
        $edit_user = User::find($id);
        return view('user.edit', ['edit_user' => $edit_user]);
    }


    public function update(Request $request, $id)
    {
        $rules = new UserRequest();
        $this->validate($request, $rules->rules());

        $user_cover = Image::make($request->file('user_cover_address'))
            ->fit(150, 150)
            ->save('content/user_cover/' . time() . '.' . $request->file('user_cover_address')->getClientOriginalExtension());

        User::where('user_id', $id)
            ->update(
                [
                    'user_cover_address' => $user_cover->basePath(),
                    'user_firstname' => $request->user_firstname,
                    'user_lastname' => $request->user_lastname,
                    'user_password' => Hash::make($request->user_password),
                    'user_icq' => $request->user_icq,
                    'user_skype' => $request->user_skype,
                    'user_about' => $request->user_about,
                ]
            );
    }


    public function destroy($id)
    {
        $user_cover = User::select('user_cover_address')
            ->where('user_id', $id)
            ->first();

        User::where('user_id', $id)->first()->delete();
        File::delete(public_path($user_cover->user_cover_address));
        return Redirect::to('/');
    }


    public function logout()
    {
        $this->auth->logout();
    }
}
