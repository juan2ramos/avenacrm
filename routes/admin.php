<?php
Route::get('/', 'HomeController@adminHome')->name('dashboard');
Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('productos/nuevo', 'ProductController@create')->name('productos.create');
Route::resource('productos', 'ProductController', ['names' => ['create' => 'product.create']]);

Route::get('puntos/nuevo', 'PointController@create')->name('puntos.create');
Route::resource('puntos', 'PointController', ['names' => ['create' => 'puntos.nuevo']]);

Route::get('zonas/nuevo', 'AreaController@create')->name('zonas.create');
Route::resource('zonas', 'AreaController', ['names' => ['create' => 'zonas.nuevo']]);

Route::get('usuarios/nuevo', 'UserController@create')->name('usuarios.create');
Route::resource('usuarios', 'UserController', ['names' => ['create' => 'usuarios.nuevo']]);

Route::get('inventarios/{date?}', 'InventoryController@index')->name('inventarios.index');
Route::post('updateMany/{date}', 'InventoryController@updateMany')->name('inventarios.updateMany');
Route::post('updateManyInventory', 'InventoryController@store')->name('inventarios.store');
Route::get('inventarios/{date}', 'PointController@index')->name('inventoryDetailDate');

Route::get('asignar/{user}', 'UserController@assign')->name('assign');
Route::post('asignar', 'UserController@assignCreate')->name('assign.create');

Route::get('detalle-punto/{point}/{date}', 'PointController@pointDetailToday')->name('pointDetailToday');
Route::post('pointDetailToday', 'PointController@pointDetailTodayUpdate')->name('pointDetailToday.update');
Route::get('puntos-por-fecha/{date}', 'PointController@pointDetailDate')->name('pointDetailDate');

