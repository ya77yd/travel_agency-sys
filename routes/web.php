<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AirportsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/airport_setup', [AirportsController::class, 'index'])->name('airport_setup');
});

require __DIR__.'/auth.php';
