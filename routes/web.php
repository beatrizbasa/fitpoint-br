<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonalTrainerController;
use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/main', function () {
    return view('main_home');
});

Route::prefix('client')->group(function(){
    Route::get('/home', [ClientController::class, 'home'])->name('client.home');
    Route::get('/registration', [ClientController::class, 'registration'])->name('client.registration');
    Route::get('/login_form', [ClientController::class, 'index'])->name('login_form');
    Route::post('/login/login_client', [ClientController::class, 'login'])->name('client.login');

    Route::get('/booked_personaltrainer', [ClientController::class, 'booked_personaltrainer'])->name('client.booked_personaltrainer');
});

Route::prefix('personaltrainer')->group(function(){
    Route::get('/home', [PersonalTrainerController::class, 'home'])->name('personaltrainer.home');
    Route::get('/registration', [PersonalTrainerController::class, 'registration'])->name('personaltrainer.registration');
    Route::get('/login_form', [PersonalTrainerController::class, 'index'])->name('login_form');
    Route::post('/login/login_personaltrainer', [PersonalTrainerController::class, 'login'])->name('personaltrainer.login');
});

Route::prefix('admin')->group(function(){
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('/login_form', [AdminController::class, 'index'])->name('login_form');
    Route::post('/login/login_admin', [AdminController::class, 'login'])->name('admin.login');
});