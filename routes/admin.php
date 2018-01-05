<?php
Route::get('/', 'HomeController@adminHome')->name('dashboard');
Route::get('/usuarios', 'UserController@index')->name('users')->middleware('permission:view_user');

Route::resource('productos','ProductController');