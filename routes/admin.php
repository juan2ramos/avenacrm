<?php
Route::get('/', 'HomeController@adminHome')->name('dashboard');
Route::get('/usuarios', 'UserController@index')->name('users')->middleware('permission:view_user');

Route::get('productos/nuevo', 'ProductController@create')->name('productos.create');
Route::resource('productos','ProductController',['names' => ['create' => 'product.create']]);

Route::get('puntos/nuevo', 'PointController@create')->name('puntos.create');
Route::resource('puntos','PointController',['names' => ['create' => 'puntos.nuevo']]);