<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function registration()
    {
        return view('admin.admin_registration');
    }

    public function index()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            //if nagmatch lahat
            return redirect()->route('admin.home')->with('error', 'admin logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function home()
    {
        return view('admin.admin_home');
    }
}
