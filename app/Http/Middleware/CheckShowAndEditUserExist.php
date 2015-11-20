<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckShowAndEditUserExist
{

    /*
        Если id пользователя не существует, то redirect
        Использует 'check.user.id' UserController для методов
        show и edit.
    */

    public function handle($request, Closure $next)
    {
        $check = $request->route()->parameter('user');
        $roll =  User::where('user_id', intval($check))->first();

        if(is_null($roll)){
            return redirect('/');
        }

        return $next($request);
    }
}
