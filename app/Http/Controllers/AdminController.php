<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admins;
use App\Models\Client;
use App\Models\Instructor;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    //
    public function registration()
    {
        return view('admin.a_registration');
    }

    // public function index()
    // {
    //     // return view('admin.admin_login');

    // }

    public function to_login()
    {
        return view('admin.a_login');
    }
    // public function logout()
    // {
    //     Auth::guard('admin')->logout(); // Assuming you are using a guard named 'admin'
    //     return redirect()->route('admin.login'); // Redirect to the admin login page
    // }
    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('admin.dashboard')->with('error', 'Admin account logged in successfully!');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'Invalid credentials');
            // return view('admin.error');
        }
    }

    public function index(Request $request): View
    {
        // return view('admin.admin_home');

        // $totalAdmins = Admin::count();
        // $totalInstructor = Instructor::count();
        // $totalClient = Client::count();
        // $totalPayments = Payments::count();

        $perPage = $request->input('per_page', 5); // Number of items to show per page
        $admins = Admin::paginate($perPage);
        // return view('admin.a_dashboard', compact('totalAdmins', 'totalInstructor', 'totalClient', 'totalPayments',));

        return view('admin.a_index',compact('admins'));
    }

    public function create(): View
    {
        return view('admin.a_create');
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
            'email' => 'required|email|unique:admins,email',
           'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
            'confirm_password' => 'required|same:password',
            'birthday' => 'required',
            'gender' => 'required|in:male,female',
        ]);
      
        Admin::create($request->all());
       
        return redirect()->route('admin.index')->with('success','Admin created successfully.');
    }

    public function edit(Admin $admin)
    {
        return view('admin.a_edit', compact('admin'));
    }
    
    public function update(Request $request, Admin $admin)
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
    
        $admin->update($request->all());
    
        return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = Admin::query();

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
        $admins= $query->paginate(5);

        return view('admin.a_index', compact('admin')); 
    }
   

    public function trash(): View
    {
        $admin = Admin::onlyTrashed()->get();
    
        return view('admin.a_trash', compact('admin'));
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
    
        if ($admin) {
            $admin->delete();
            return redirect()->route('admin.login')->with('success', 'Admin deleted successfully.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Admin not found.');
        }
    }
    
    public function restore($id): RedirectResponse
    {
        $admin = Admin::onlyTrashed()->findOrFail($id);
        $admin->restore();
    
        return redirect()->route('admin.index')->with('success', 'Admin restored successfully');
    }

    public function forceDelete($id): RedirectResponse
    {
        $admin = Admin::onlyTrashed()->findOrFail($id);
        $admin->forceDelete(); // Permanently delete

        return redirect()->route('admin.trash')->with('success', 'Admin permanently deleted');
    }

    public function show()
    {

    }
}
