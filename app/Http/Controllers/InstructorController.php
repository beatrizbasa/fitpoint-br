<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Feedbacks;
use App\Models\Instructor;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InstructorController extends Controller
{
    //
    public function registration()
    {
        return view('instructor.i_registration');
    }

    public function to_login()
    {
        return view('instructor.i_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('instructor')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('instructor.appointments')->with('error', 'Instructor logged in successfully!');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'Invalid credentials');
            // return view('admin.error');
        }
    }

    public function appointments()
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $appointments = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'appointments.medical_condition', 'appointments.target', 'appointments.appointment_date', 'appointments.appointment_time', 'appointments.status', 'appointments.id')
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
        $ptid = Auth::guard('instructor')->user()->id;

        $workouts = Workout::join('clients', 'clients.id', '=', 'workouts.client_id')
            ->join('instructors', 'instructors.id', '=', 'workouts.instructor_id')
            ->select('workouts.id', 'instructors.firstname as i_firstname', 'instructors.lastname as i_lastname', 'clients.firstname as c_firstname', 'clients.lastname as c_lastname', 'workouts.workout_date', 'workouts.focus', 'workouts.exercises')
            ->where('workouts.instructor_id', $ptid)
            ->get();
        return view('instructor.i_workout_plans', ['workouts'=>$workouts]);
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

    public function stat_accepted($apptid)
    {
        $appt = Appointment::findOrFail($apptid);

        $appt->status = "Accepted";
    
        $appt->save();
        return redirect()->route('instructor.appointments');
    }
    
    public function stat_denied($apptid)
    {
        $appt = Appointment::findOrFail($apptid);

        $appt->status = "Denied";
    
        $appt->save();
        return redirect()->route('instructor.appointments');
    }

    public function profile()
    {
        return view('instructor.i_profile');
    }

    public function update_profile()
    {
        return view('instructor.i_update_profile');
    }

    public function update_profile_changes(Request $request, $ptid){

        $instructor = Instructor::findOrFail($ptid);

        $instructor->firstname = $request->input('firstname');
        $instructor->lastname = $request->input('lastname');
        $instructor->address = $request->input('address');
        $instructor->contact_no = $request->input('contact_no');
        $instructor->birthday = $request->input('birthday');
        $instructor->gender = $request->input('gender');
    
        $instructor->save();
    
        return redirect()->route('instructor.profile');
    }

    public function logout(){
        Auth::guard('instructor')->logout();
        return redirect()->route('instructor.login_form')->with('error', 'Instructor account logged out successfully!');
    }

    public function index()
    {
        $instructors = Instructor::paginate(5); // 10 instructors per page
        return view('admin.i_index', compact('instructors'));
    }            
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.i_create');
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
      
        Instructor::create($request->all());
       
        return redirect()->route('instructor.index')->with('success','Instructor created successfully.');
    }

    public function edit(Instructor $instructor)
    {
        return view('admin.i_edit', compact('instructor'));
    }
    
    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_no' => 'required|size:11',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password', // Ensure password matches confirm_password
            'birthday' => 'required',
            'gender' => 'required|in:male,female,other', // Include 'other' in the list
        ]);
    
        $instructor->update($request->all());
    
        return redirect()->route('instructor.index')->with('success', 'Instructor updated successfully');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Instructor::query();

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
                ->orWhere('created_at', 'LIKE', "%$search%")
                ->orWhere('updated_at', 'LIKE', "%$search%");
            });
        }
        $instructors = $query->paginate(5);

        return view('admin.i_index', compact('instructors'));
 
    }

    public function trash(): View
    {
        $Instructor = Instructor::onlyTrashed()->get();
    
        return view('admin.i_trash', compact('Instructor'));
    }
    public function destroy($id): RedirectResponse
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete(); // Soft delete
    
        return redirect()->route('instructor.index')->with('success', 'Instructor Deleted successfully');
    }
    
    public function restore($id): RedirectResponse
    {
        $instructor = Instructor::onlyTrashed()->findOrFail($id);
        $instructor->restore();
    
        return redirect()->route('instructor.index')->with('success', 'Instructor restored successfully');
    }



    public function forceDelete($id): RedirectResponse
    {
        $instructor = Instructor::onlyTrashed()->findOrFail($id);
        $instructor->forceDelete(); // Permanently delete

        return redirect()->route('instructor.trash')->with('success', 'Instructor permanently deleted');
    }

    public function select_client()
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $clients = Appointment::join('clients', 'clients.id', '=', 'appointments.client_id')
            ->select('clients.firstname as client_firstname', 'clients.lastname as client_lastname', 'clients.address', 'clients.contact_no', 'clients.birthday', 'clients.gender', 'clients.id')
            ->where('appointments.instructor_id', $ptid)
            ->where('appointments.status', 'Accepted')
            ->get();

        return view('instructor.i_select_clients', ['clients' => $clients]);
    }

    public function add_workout($clientid)
    {
        $ptid = Auth::guard('instructor')->user()->id;

        $clients = Client::select('*')
            ->where('id', $clientid)
            // ->where('appointments.status', 'Accepted')
            ->get();

        return view('instructor.i_add_workout', ['clients' => $clients]);
    }
    
}
