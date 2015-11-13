<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Main@index');
Route::resource('book', 'BookController');
Route::resource('signup', 'SignupController');