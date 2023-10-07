<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    return view('welcome');
});

Route::prefix('client')->group(function(){
    Route::get('/home', [ClientController::class, 'home'])->name('home');
    Route::get('/registration', [ClientController::class, 'registration'])->name('registration');
    Route::get('/login', [ClientController::class, 'login'])->name('login');
});