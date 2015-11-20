<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Guard;
use Closure;

class BookAuthenticate
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /*
        Если guest, то редирект со всех страниц,
        кроме: show. Использует 'book.auth' BookController
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
