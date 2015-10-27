<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', 'PostController');
Route::resource('signup', 'SignupController');