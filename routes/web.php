<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkoutController;


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
})->name('home');

Route::get('/about', function () {
    return view('main_about');
})->name('about');

Route::prefix('client')->group(function(){
    Route::get('/registration', [ClientController::class, 'registration'])->name('client.registration');
    Route::post('/register_acc', [ClientController::class, 'register_acc'])->name('client.register_acc');
    Route::get('/login_form', [ClientController::class, 'to_login'])->name('client.login_form');
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
    Route::get('/login_form', [InstructorController::class, 'to_login'])->name('instructor.login_form');
    Route::post('/login/login_instructor', [InstructorController::class, 'login'])->name('instructor.login');

    Route::get('/appointments', [InstructorController::class, 'appointments'])->name('instructor.appointments');
    Route::get('/stat_accepted/{apptid}', [InstructorController::class, 'stat_accepted'])->name('instructor.stat_accepted');
    Route::get('/stat_denied/{apptid}', [InstructorController::class, 'stat_denied'])->name('instructor.stat_denied');
    Route::get('/clients_list', [InstructorController::class, 'clients_list'])->name('instructor.clients_list');

    Route::get('/workout_plans', [InstructorController::class, 'workout_plans'])->name
    ('instructor.workout_plans');
    Route::get('/select_client', [InstructorController::class, 'select_client'])->name
    ('instructor.select_client');

    Route::get('/add_workout/{clientid}', [InstructorController::class, 'add_workout'])->name('instructor.add_workout');
    Route::post('/adding_workout', [WorkoutController::class, 'adding_workout'])->name('instructor.adding_workout');
    Route::get('/edit_workout/{id}', [WorkoutController::class, 'show_edit'])->name('instructor.edit_workout');
    Route::post('/editing_workout/{id}', [WorkoutController::class, 'editing_workout'])->name('instructor.editing_workout');
    Route::get('/delete_workout/{id}', [WorkoutController::class, 'delete_workout'])->name('instructor.delete_workout');


    Route::get('/feedbacks', [InstructorController::class, 'feedbacks'])->name('instructor.feedbacks');

    Route::get('/profile', [InstructorController::class, 'profile'])->name('instructor.profile');
    Route::get('/logout', [InstructorController::class, 'logout'])->name('instructor.logout');

    Route::get('/update_profile', [InstructorController::class, 'update_profile'])->name('instructor.update_profile');
    Route::post('/update_profile/save_changes/{ptid}', [InstructorController::class, 'update_profile_changes'])->name('instructor.update_profile_changes');
});
Route::resource('/dashboard', DashboardController::class);

// 
Route::prefix('admin')->group(function(){
    
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin', AdminController::class);
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('/login_form', [AdminController::class, 'to_login'])->name('login_form');
    Route::post('/login/login_admin', [AdminController::class, 'login'])->name('admin.login');

    Route::get('/admins/search', [AdminController::class, 'search'])->name('admins.search');
    Route::get('/trashedAdmins', [AdminController::class, 'trash'])->name('admin.trash');
    Route::get('/admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::get('/admin/forceDelete/{id}', [AdminController::class,'forceDelete'])->name('admin.forceDelete');

    Route::resource('instructor', InstructorController::class);
    Route::get('/instructors/search', [InstructorController::class, 'search'])->name('instructor.search');
    Route::get('/trashedInstructors', [InstructorController::class, 'trash'])->name('instructor.trash');
    Route::get('/instructor/restore/{id}', [InstructorController::class, 'restore'])->name('instructor.restore');
    Route::get('/instructor/forceDelete/{id}', [InstructorController::class, 'forceDelete'])->name('instructor.forceDelete');

    Route::resource('clients', ClientController::class);
    Route::get('/clients/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/trashedClients', [ClientController::class, 'trash'])->name('clients.trash');
    Route::get('/client/restore/{id}', [ClientController::class, 'restore'])->name('clients.restore');
    Route::get('/client/forceDelete/{id}', [ClientController::class, 'forceDelete'])->name('clients.forceDelete');
    Route::get('/client/search',[ClientController::class,'search'])->name('clients.search');

    Route::resource('feedback', FeedbackController::class);

    Route::resource('appointments', AppointmentController::class);
    Route::get('/appointment/search', [AppointmentController::class, 'search'])->name('appointments.search');
    Route::get('/trashedAppointments', [AppointmentController::class, 'trash'])->name('appointments.trash');
    Route::get('/appointments/restore/{id}', [AppointmentController::class, 'restore'])->name('appointments.restore');
    Route::get('/appointments/forceDelete/{id}', [AppointmentController::class, 'forceDelete'])->name('appointments.forceDelete');
    Route::get('/appointments/show/{id}', [AppointmentController::class, 'show'])->name('appointments.view');

    Route::resource('payments', PaymentsController::class);
    Route::get('/payments/mark-as-paid/{id}', [PaymentsController::class, 'markAsPaid'])->name('payments.markAsPaid');
    Route::get('/payments/mark-as-unpaid/{id}', [PaymentsController::class, 'markAsUnpaid'])->name('payments.markAsUnpaid');
    Route::get('/paymets/search', [PaymentsController::class, 'search'])->name('payments.search');
    Route::get('/trashedPayments', [PaymentsController::class, 'trash'])->name('payments.trash');
    Route::get('/payments/restore/{id}', [PaymentsController::class, 'restore'])->name('payments.restore');
    Route::get('/payments/forceDelete/{id}', [PaymentsController::class, 'forceDelete'])->name('payments.forceDelete');
    Route::get('/unpaid-persons', [PaymentsController::class, 'searchUnpaid'])->name('payments.unpaid-persons');
    
    Route::get('/paid-persons', [PaymentsController::class, 'searchPaid'])->name('payments.paid-persons');
});