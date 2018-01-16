<?php
Route::get('/', 'HomeController@homePoint')->name('homePoint');
Route::post('/', 'PointController@pointProductUpdate')->name('pointProduct.update');


