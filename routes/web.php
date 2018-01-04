<?php


Route::get('/', function () {
    return view('home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::resource('user', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('posts', 'PostController');


