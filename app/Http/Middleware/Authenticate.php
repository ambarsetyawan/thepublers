<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /*
        Если guest, то редирект со всех страниц, кроме:
        index, store. Использует 'auth' UserController
    */
    public function handle($request, Closure $next)
    {

        if($this->auth->guest())
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
