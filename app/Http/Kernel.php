<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];


    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.access' => \App\Http\Middleware\AuthcheckedAccessPage::class,
        'book.auth' => \App\Http\Middleware\BookAuthenticate::class,
        'check.user.id' => \App\Http\Middleware\CheckShowAndEditUserExist::class,
        'logout' => \App\Http\Middleware\UserLogout::class,

        'auth.enter' => \App\Http\Middleware\RedirectIfAuthenticated::class,

//        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,

    ];
}
