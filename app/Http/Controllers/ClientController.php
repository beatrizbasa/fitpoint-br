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
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

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

    public function to_login()
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

    public function register_acc(Request $request){
        Client::insert([
            'firstname' => $request -> firstname,
            'lastname' => $request -> lastname,
            'address' => $request->address,
            'contact_no' => $request->contact,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password), //makes it a hash password
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('client.login_form')->with('error', 'Client account created successfully');
    }

    public function home()
    {
        $instructors = Instructor::get();
        
        foreach ($instructors as $instructor){
            $full_name = $instructor->full_name;
        }
        
        $cid = Auth::guard('client')->user()->id;

        $curr_date = Carbon::now()->format('Y-m-d');
        
        $appointments = Appointment::select('*')
            ->join('instructors', 'appointments.instructor_id', '=', 'instructors.id')
            ->where('appointments.client_id', $cid)
            // ->where('appointments.appointment_date', '>=', now())
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $curr_appt = '';
        foreach ($appointments as $appt){
            $curr_appt = $appt->id;
        }
        if ($curr_appt == null){
            $curr_appt == '';
        }
        
        return view('client.c_home', ['appointments' => $appointments, 'curr_appt'=>$curr_appt, 'instructors' => $instructors, 'cid' => $cid]);
    }

    public function booked_instructor($cid)
    {
        $instructor = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->get();

        $curr_ins = '';
        foreach ($instructor as $ins){
            $curr_ins = $ins->id;
        }
        if ($curr_ins == null){
            $curr_ins == '';
        }
        // $instructor = PersonalTrainer::get();
        return view('client.c_booked_instructor', ['instructor' => $instructor, 'curr_ins'=>$curr_ins]);
    }

    public function workout_plan()
    {
        $cid = Auth::guard('client')->user()->id;
        $instructor = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->get();

        $curr_ins = '';
        foreach ($instructor as $ins){
            $curr_ins = $ins->firstname;
        }

        if ($curr_ins == null){
            $curr_ins == '';
        }
        
        return view('client.c_workout_plan',['curr_ins'=>$curr_ins]);
    }

    public function appointments()
    {
        // $appointments = Appointment::get();
        // return view('client.c_appointments', ['appointments' => $appointments]);
        $cid = Auth::guard('client')->user()->id;
        // $curr_date = dd(Carbon::now()->format('Y-m-d'));
        $curr_date = Carbon::now()->format('Y-m-d');
        $pen_appts = Appointment::select('*')
            ->join('instructors', 'appointments.instructor_id', '=', 'instructors.id')
            ->where('appointments.appointment_date', '>=', now())
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Pending')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();

        $pen_id = '';
        foreach ($pen_appts as $pens){
            $pen_id = $pens->id;
        }

        if ($pen_id == null){
            $pen_id == '';
        }

        $acc_appts = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $dec_appts = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Declined')
            ->orderBy('appointments.appointment_date', 'asc')
            ->get();
        
        $can_appts = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Cancelled')
            ->orderBy('appointments.id', 'desc')
            ->get();

        return view('client.c_appointments', ['pen_appts' => $pen_appts, 'acc_appts' => $acc_appts, 'dec_appts' => $dec_appts, 'can_appts' => $can_appts, 'pen_id'=>$pen_id]);
    }

    public function instructors()
    {
        $instructors = Instructor::get();
        
        foreach ($instructors as $instructor){
            $full_name = $instructor->full_name;
        }
        return view('client.c_instructors', ['instructors' => $instructors]);
    }


    public function feedbacks($cid)
    {
        $instructor = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->join('clients', 'clients.id', '=', 'appointments.client_id')
            ->where('appointments.client_id', $cid)
            ->where('appointments.status', 'Accepted')
            ->get();

        $feedbacks = Feedbacks::join('instructors', 'instructors.id', '=', 'feedbacks.instructor_id')
            ->join('clients', 'clients.id', '=', 'feedbacks.client_id')
            ->select('instructors.firstname as ptrainer_firstname', 'instructors.lastname as ptrainer_lastname', 'clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'feedbacks.content as content', 'feedbacks.created_at as fback_date')
            ->get();
        
        $ins_id = '';
        foreach ($instructor as $ins){
            $ins_id = $ins->id;
        }

        if ($ins_id == null){
            $ins_id == '';
        }
            
        return view('client.c_feedbacks', ['feedbacks' => $feedbacks, 'instructor'=>$instructor, 'ins_id'=>$ins_id]);
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
            'instructor_id' => 'required|integer',
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
    public function index(Request $request): View
    {     
        $perPage = $request->input('per_page', 5); // Number of items to show per page
        $clients = Client::paginate($perPage);
        return view('admin.c_index',compact('clients'));
                    
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.c_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_no' => 'required|size:11',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
            'birthday' => 'required',
            'gender' => 'required|in:male,female',
        ]);
      
       Client::create($request->all());
       
        return redirect()->route('clients.index')->with('success','Client created successfully.');
    }

    public function edit(Client $client): View
    {
        return view('admin.c_edit', compact('client'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_no' => 'required|size:11', 
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
            'birthday' => 'required',
            'gender' => 'required|in:male,female',
        ]);
      
        $client->update($request->all());
      
        return redirect()->route('clients.index')->with('success','Client updated successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Client::query();

        if (!empty($search)) {
            $query->where(function($query) use ($search) {
                $query->where('firstname', 'LIKE', "%$search%")
                ->orWhere('lastname', 'LIKE', "%$search%")
                ->orWhere('address', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('contact_no', 'LIKE', "%$search%")
                ->orWhere('password', 'LIKE', "%$search%")
                ->orWhere('birthday', 'LIKE', "%$search%")
                ->orWhere('gender', 'LIKE', "%$search%")
               
                ->orWhere('created_at', 'LIKE', "%$search%");
            });
        }
        $clients = $query->paginate(5);

        return view('admin.c_index', compact('clients'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function trash(): View
    {
        $client = Client::onlyTrashed()->get();
    
        return view('admin.c_trash', compact('client'));
    }
    
    public function destroy($id): RedirectResponse
    {
        $client = Client::findOrFail($id);
        $client->delete(); // Soft delete
    
        return redirect()->route('clients.index')->with('success', 'Client Deleted successfully');
    }
    
    public function restore($id): RedirectResponse
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client ->restore();
    
        return redirect()->route('clients.index')->with('success', 'Instructor restored successfully');
    }



    public function forceDelete($id): RedirectResponse
    {
        $client  = Client::onlyTrashed()->findOrFail($id);
        $client ->forceDelete(); // Permanently delete

        return redirect()->route('client.trash')->with('success', 'Client permanently deleted');
    }
}
