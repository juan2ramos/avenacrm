<?php
Route::get('/', 'Homecontroller@home');
Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

