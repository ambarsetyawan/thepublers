<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('signup', 'SignupController@index');
Route::post('signup', 'SignupController@store');

Route::resource('post', 'PostController');
Route::resource('profile', 'ProfileController', ['except' => ['create']]);