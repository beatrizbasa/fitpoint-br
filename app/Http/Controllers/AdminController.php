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

    public function index()
    {
        // return view('admin.admin_login');

    }

    public function to_login()
    {
        return view('admin.a_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('admin.index')->with('error', 'admin logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function home()
    {
        // return view('admin.admin_home');

        $totalAdmins = Admin::count();
        $totalInstructor = Instructor::count();
        $totalClient = Client::count();
        $totalPayments = Payments::count();
        return view('admin.a_dashboard', compact('totalAdmins', 'totalInstructor', 'totalClient', 'totalPayments',));
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
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
            'birthday' => 'required',
            'gender' => 'required|in:male,female',
        ]);
      
        Admin::create($request->all());
       
        return redirect()->route('admin.a_index')->with('success','Admin created successfully.');
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
    
        return redirect()->route('admin.a_index')->with('success', 'Admin updated successfully');
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

    public function destroy($id): RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        $admin->delete(); // Soft delete
    
        return redirect()->route('admin.a_index')->with('success', 'Admin Deleted successfully');
    }
    
    public function restore($id): RedirectResponse
    {
        $admin = Admin::onlyTrashed()->findOrFail($id);
        $admin->restore();
    
        return redirect()->route('admin.a_index')->with('success', 'Admin restored successfully');
    }

    public function forceDelete($id): RedirectResponse
    {
        $admin = Admin::onlyTrashed()->findOrFail($id);
        $admin->forceDelete(); // Permanently delete

        return redirect()->route('admin.a_trash')->with('success', 'Admin permanently deleted');
    }
}
