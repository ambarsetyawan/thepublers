<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Session;

class UserLogout
{

    protected $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /*
        Если пользоватьтель отлогинен,
        то редирект. Использует 'logout'
        UserController.
    */
    public function handle($request, Closure $next)
    {
        if($this->auth->check()){
            if($this->auth->user())
            {
                $this->auth->logout();
                Session::flush();
                return redirect('/');
            }
        }

        return $next($request);
    }
}
