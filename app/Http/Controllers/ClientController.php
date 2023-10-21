<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
