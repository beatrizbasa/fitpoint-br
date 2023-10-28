<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('personaltrainer.pt_appointments');
    }

    public function clients_list()
    {
        return view('personaltrainer.pt_clients_list');
    }

    public function workout_plans()
    {
        return view('personaltrainer.pt_workout_plans');
    }

    public function feedbacks()
    {
        return view('personaltrainer.pt_feedbacks');
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
