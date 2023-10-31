<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\fullname;
use App\Models\PersonalTrainer;
use Carbon\Carbon;

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
            // 
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
        $personal_trainers = PersonalTrainer::get();
        
        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }
        
        $cid = Auth::guard('client')->user()->id;

        $curr_date = Carbon::now()->format('Y-m-d');
        
        $appointments = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.appointment_date', '>=', now())
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        return view('client.c_home', ['appointments' => $appointments, 'personal_trainers' => $personal_trainers, 'cid' => $cid]);
    }

    public function booked_personaltrainer($cid)
    {
        $personal_trainer = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->get();
        // $personal_trainer = PersonalTrainer::get();
        return view('client.c_booked_personaltrainer', ['personal_trainer' => $personal_trainer]);
    }

    public function workout_plan()
    {
        return view('client.c_workout_plan');
    }

    public function appointments()
    {
        // $appointments = Appointment::get();
        // return view('client.c_appointments', ['appointments' => $appointments]);
        $cid = Auth::guard('client')->user()->id;
        // $curr_date = dd(Carbon::now()->format('Y-m-d'));
        $curr_date = Carbon::now()->format('Y-m-d');
        $pen_appts = Appointment::select('*')
            ->join('personal_trainers', 'appointments.personal_trainer_id', '=', 'personal_trainers.id')
            ->where('appointments.appointment_date', '>=', now())
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Pending')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $acc_appts = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $dec_appts = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Declined')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $can_appts = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Cancelled')
            ->orderBy('appointments.id', 'desc')
            ->get();

        return view('client.c_appointments', ['pen_appts' => $pen_appts, 'acc_appts' => $acc_appts, 'dec_appts' => $dec_appts, 'can_appts' => $can_appts]);
    }

    public function personal_trainers()
    {
        $personal_trainers = PersonalTrainer::get();
        
        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }
        return view('client.c_personal_trainers', ['personal_trainers' => $personal_trainers]);
    }

    

    public function feedbacks($cid)
    {
        $personal_trainer = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainer_id')
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->get();

        $feedbacks = Feedbacks::join('personal_trainers', 'personal_trainers.id', '=', 'feedbacks.personal_trainer_id')
            ->join('clients', 'clients.id', '=', 'feedbacks.client_id')
            ->select('personal_trainers.firstname as ptrainer_firstname', 'personal_trainers.lastname as ptrainer_lastname', 'clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'feedbacks.content as content', 'feedbacks.created_at as fback_date')
            ->get();
            
        return view('client.c_feedbacks', ['feedbacks' => $feedbacks, 'personal_trainer'=>$personal_trainer]);
    }

    public function profile()
    {
        return view('client.c_profile');
    }

    public function update_profile()
    {
        return view('client.c_profile_update');
    }

    public function update_profile_changes(Request $request, $cid){
        // $validatedData = $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'address' => 'required|string',
        //     'contact_no' => 'required|integer',
        //     'birthday' => 'required|date',
        //     'gender' => 'required|string',
        // ]);
    
        // Client::whereId($cid)->update($validatedData);
        // return view('client.c_profile');

        $client = Client::findOrFail($cid);

        $client->firstname = $request->input('firstname');
        $client->lastname = $request->input('lastname');
        $client->address = $request->input('address');
        $client->contact_no = $request->input('contact_no');
        $client->birthday = $request->input('birthday');
        $client->gender = $request->input('gender');
    
        $client->save();
    
        return redirect()->route('client.profile');
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
