<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
use App\Models\fullname;
use App\Models\PersonalTrainer;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    public function registration()
    {
        return view('client.c_registration');
    }

    public function index()
    {
        return view('client.c_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('client')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('client.home')->with('error', 'client logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function home()
    {
        return view('client.c_home');
    }

    public function booked_personaltrainer()
    {
        return view('client.c_booked_personaltrainer');
    }

    public function workout_plan()
    {
        return view('client.c_workout_plan');
    }

    public function appointments()
    {
        return view('client.c_appointments');
    }

    public function book_appointment()
    {
        $personal_trainers = PersonalTrainer::get();
        
        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }

        return view('client.c_bookappointment', ['personal_trainers' => $personal_trainers, 'fullname' => $full_name]);
    }

    public function appointment_form()
    {
        return view('client.c_book_appointment_form');
    }

    public function personal_trainers()
    {
        // $personal_trainers = PersonalTrainer::get();
        // $users = PersonalTrainer::all()->lists('full_name', 'id');
        $personal_trainers = PersonalTrainer::get();
        
        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }
        return view('client.c_personal_trainers', ['personal_trainers' => $personal_trainers, 'fullname' => $full_name]);
    }

    

    public function feedbacks()
    {
        $feedbacks = Feedbacks::get();
 
        // return view('user.index', ['users' => $users]);
        return view('client.c_feedbacks', ['feedbacks' => $feedbacks]);
    }

    public function profile()
    {
        return view('client.c_profile');
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect()->route('client.login_form')->with('error', 'fishfarmer logged out successfully');
    }

    public function insert_feedback(Request $request) {
        $data = $request->validate([
            'client_id' => 'required|integer',
            'content' => 'required|string',
            'personal_trainer_id' => 'required|integer',
            // add other fields validations
        ]);
    
        $newData = Feedbacks::create($data);
        
        if ($newData) {
            return response()->json(['message' => 'Feedback submitted!']);
        } else {
            return response()->json(['message' => 'Error submitting feedback.'], 500);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
