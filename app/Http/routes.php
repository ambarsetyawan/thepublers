<?php

// Authentication routes
Route::get('login', 'EnterController@index');
Route::post('login', 'EnterController@enter');

// Start route
Route::get('/', 'Main@index');

// CRUD book routes
Route::resource('book', 'BookController');

// CRUD comment routes
Route::resource('book.comment', 'CommentController');

// CRUD user routes
Route::resource('user', 'UserController');

// Logout
Route::get('/logout', 'UserController@logout');
