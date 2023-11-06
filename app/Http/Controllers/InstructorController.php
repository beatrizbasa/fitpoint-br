<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    //
    public function registration()
    {
        return view('instructor.i_registration');
    }

    public function index()
    {
        return view('instructor.i_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('instructor')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('instructor.appointments')->with('error', 'instructor logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function appointments()
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $appointments = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.appointment_date', '>=', now())
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $acc_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $dec_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $can_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        return view('instructor.i_appointments', ['appointments' => $appointments, 'ptid' => $ptid, 'acc_appts' => $acc_appts, 'dec_appts' => $dec_appts, 'can_appts' => $can_appts]);
        // return view('personaltrainer.pt_appointments');
    }

    public function clients_list()
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $clients = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'clients.address', 'clients.contact_no', 'clients.birthday', 'clients.gender')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->get();

        return view('instructor.i_clients_list', ['clients' => $clients]);
    }

    public function workout_plans()
    {
        return view('instructor.i_workout_plans');
    }

    public function feedbacks()
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $feedbacks = Feedbacks::join('clients', 'clients.id', '=', 'feedbacks.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'feedbacks.content as content', 'feedbacks.created_at as fback_date')
            ->where('feedbacks.instructor_id', $ptid)
            ->get();
        return view('instructor.i_feedbacks', ['feedbacks' => $feedbacks]);
    }

    public function profile()
    {
        return view('instructor.i_profile');
    }

    public function logout(){
        Auth::guard('instructor')->logout();
        return redirect()->route('instructor.login_form')->with('error', 'fishfarmer logged out successfully');
    }
}
