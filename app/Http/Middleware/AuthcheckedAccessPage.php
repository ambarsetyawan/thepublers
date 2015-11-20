<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Guard;
use Closure;

class AuthcheckedAccessPage
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /*
        Если пользователь залогинен:
        не показывать страницу регистрации и логина.
        Использует 'auth.access' только index в
        EnterController и UserController.
    */

    public function handle($request, Closure $next)
    {

        if($this->auth->check())
        {
            return redirect('/');
        }

        return $next($request);
    }
}
