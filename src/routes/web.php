<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;

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

Route::get('/', MainController::class);

Route::get('/step2', [MainController::class, 'step2']);

Route::get('/social_buttons', [MainController::class, 'social_buttons']);

Route::post('/submit_form1', [MainController::class, 'submit_form1']);

Route::post('/submit_form2', [MainController::class, 'submit_form2']);

Route::get('/all_members', [MainController::class, 'all_members']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('home', HomeController::class);

Route::get('/home/{id}/{hide}', [HomeController::class, 'hide_or_show']);
