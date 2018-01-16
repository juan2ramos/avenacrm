<?php
Route::get('/', 'HomeController@home');
Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

