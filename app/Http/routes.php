<?php

// Authentication routes
Route::get('login', 'EnterController@index');
Route::post('login', 'EnterController@enter');

// Start route
Route::get('/', 'Main@index');

// CRUD book routes
Route::get('book/all', 'BookController@all');
Route::get('book/{slug}', 'BookController@slug');
Route::resource('book', 'BookController');


// CRUD comment routes
Route::post('book/{slug}/comment', 'CommentController@slug');
Route::resource('book.comment', 'CommentController');

// CRUD user routes
Route::resource('user', 'UserController');

// Logout
Route::get('/logout', 'UserController@logout');

// Search field
Route::match(['get', 'post'], 'search', 'SearchController@search');

//Quote
Route::group(['middleware' => 'auth'], function () {
    Route::resource('quote', 'QuoteController');
});

//Category
Route::group(['middleware' => 'auth'], function () {
    Route::get('category/all', 'CategoryController@all');
    Route::resource('category', 'CategoryController');
});