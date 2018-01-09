<?php
Route::get('/', 'HomeController@adminHome')->name('dashboard');
Route::get('/usuarios', 'UserController@index')->name('users')->middleware('permission:view_user');

Route::get('productos/nuevo', 'ProductController@create')->name('productos.create');
Route::resource('productos','ProductController',['names' => ['create' => 'product.create']]);

Route::get('puntos/nuevo', 'PointController@create')->name('puntos.create');
Route::resource('puntos','PointController',['names' => ['create' => 'puntos.nuevo']]);

Route::get('zonas/nuevo', 'AreaController@create')->name('zonas.create');
Route::resource('zonas','AreaController',['names' => ['create' => 'zonas.nuevo']]);

Route::get('usuarios/nuevo', 'UserController@create')->name('usuarios.create');
Route::resource('usuarios','UserController',['names' => ['create' => 'usuarios.nuevo']]);

Route::get('inventarios/nuevo', 'InventoryController@create')->name('inventarios.create');
Route::resource('inventarios','InventoryController',['names' => ['create' => 'inventarios.nuevo']]);