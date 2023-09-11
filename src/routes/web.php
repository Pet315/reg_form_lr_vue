<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    session_start();
    return view('main/index');
});

Route::get('/step2', function () {
    session_start();
    return view('main/step2');
});

Route::get('/social_buttons', function () {
    session_start();
    return view('main/social_buttons');
});

Route::get('/all_members', function () {
    return view('main/all_members');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
