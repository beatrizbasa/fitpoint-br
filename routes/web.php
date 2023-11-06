<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;


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
    Route::get('/registration', [ClientController::class, 'registration'])->name('client.registration');
    Route::get('/login_form', [ClientController::class, 'index'])->name('client.login_form');
    Route::post('/login/login_client', [ClientController::class, 'login'])->name('client.login');

    Route::get('/home', [ClientController::class, 'home'])->name('client.home');

    Route::get('/booked_instructor/{cid}', [ClientController::class, 'booked_instructor'])->name('client.booked_instructor');
    Route::get('/workout_plan', [ClientController::class, 'workout_plan'])->name('client.workout_plan');

    Route::get('/appointments', [ClientController::class, 'appointments'])->name('client.appointments');
    Route::get('/book_appointment', [AppointmentController::class, 'book_appointment'])->name('client.book_appointment');
    Route::get('/book_appointment_form/{ptid}', [AppointmentController::class, 'appointment_form'])->name('client.book_appointment_form');
    Route::post('/insert_appointment', [AppointmentController::class, 'insert_appointment'])->name('client.insert_appointment');

    Route::get('/instructors', [ClientController::class, 'instructors'])->name('client.instructors');

    Route::get('/feedbacks/{cid}', [ClientController::class, 'feedbacks'])->name('client.feedbacks');
    Route::post('/insert_feedback', [ClientController::class, 'insert_feedback'])->name('client.insert_feedbacks');

    Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/update_profile', [ClientController::class, 'update_profile'])->name('client.update_profile');
    Route::post('/update_profile/save_changes/{cid}', [ClientController::class, 'update_profile_changes'])->name('client.update_profile_changes');

    Route::get('/logout', [ClientController::class, 'logout'])->name('client.logout');
});

Route::prefix('instructor')->group(function(){
    Route::get('/home', [InstructorController::class, 'home'])->name('instructor.home');
    Route::get('/registration', [InstructorController::class, 'registration'])->name('instructor.registration');
    Route::get('/login_form', [InstructorController::class, 'index'])->name('instructor.login_form');
    Route::post('/login/login_instructor', [InstructorController::class, 'login'])->name('instructor.login');

    Route::get('/appointments', [InstructorController::class, 'appointments'])->name('instructor.appointments');
    Route::get('/clients_list', [InstructorController::class, 'clients_list'])->name('instructor.clients_list');
    Route::get('/workout_plans', [InstructorController::class, 'workout_plans'])->name('instructor.workout_plans');
    Route::get('/feedbacks', [InstructorController::class, 'feedbacks'])->name('instructor.feedbacks');

    Route::get('/profile', [InstructorController::class, 'profile'])->name('instructor.profile');
    Route::get('/logout', [InstructorController::class, 'logout'])->name('instructor.logout');
});

Route::prefix('admin')->group(function(){
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('/login_form', [AdminController::class, 'index'])->name('login_form');
    Route::post('/login/login_admin', [AdminController::class, 'login'])->name('admin.login');
});