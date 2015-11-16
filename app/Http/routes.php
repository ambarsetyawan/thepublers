<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Main@index');

Route::get('/enter', 'EnterController@index');
Route::post('/enter', 'EnterController@enter');

Route::resource('book', 'BookController');
Route::resource('user', 'UserController');