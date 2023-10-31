<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalTrainerController extends Controller
{
    //
    public function registration()
    {
        return view('personaltrainer.pt_registration');
    }

    public function index()
    {
        return view('personaltrainer.pt_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('personaltrainer')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('personaltrainer.appointments')->with('error', 'personaltrainer logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function appointments()
    {
        $ptid = Auth::guard('personaltrainer')->user()->id;

        $appointments = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.personal_trainer_id', $ptid)
            ->where('appointments.appointment_date', '>=', now())
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $acc_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.personal_trainer_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $dec_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.personal_trainer_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $can_appts = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status')
            ->where('appointments.personal_trainer_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        return view('personaltrainer.pt_appointments', ['appointments' => $appointments, 'ptid' => $ptid, 'acc_appts' => $acc_appts, 'dec_appts' => $dec_appts, 'can_appts' => $can_appts]);
        // return view('personaltrainer.pt_appointments');
    }

    public function clients_list()
    {
        $ptid = Auth::guard('personaltrainer')->user()->id;

        $clients = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'clients.address', 'clients.contact_no', 'clients.birthday', 'clients.gender')
            ->where('appointments.personal_trainer_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->get();

        return view('personaltrainer.pt_clients_list', ['clients' => $clients]);
    }

    public function workout_plans()
    {
        return view('personaltrainer.pt_workout_plans');
    }

    public function feedbacks()
    {
        $ptid = Auth::guard('personaltrainer')->user()->id;

        $feedbacks = Feedbacks::join('clients', 'clients.id', '=', 'feedbacks.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'feedbacks.content as content', 'feedbacks.created_at as fback_date')
            ->where('feedbacks.personal_trainer_id', $ptid)
            ->get();
        return view('personaltrainer.pt_feedbacks', ['feedbacks' => $feedbacks]);
    }

    public function profile()
    {
        return view('personaltrainer.pt_profile');
    }

    public function logout(){
        Auth::guard('personaltrainer')->logout();
        return redirect()->route('personaltrainer.login_form')->with('error', 'fishfarmer logged out successfully');
    }
}
