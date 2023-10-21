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
            return redirect()->route('personaltrainer.home')->with('error', 'personaltrainer logged in successfully');
            // return view('admin.admin_dashboard');
        }
        else{
            return back()->with('error', 'invalid credentialsss');
            // return view('admin.error');
        }
    }

    public function home()
    {
        return view('personaltrainer.pt_home');
    }
}
