<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('airport_setup', function () {
    return view('sys_setup/airports');
});
