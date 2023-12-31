<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //
    public function book_appointment()
    {
        $instructors = Instructor::get();
        
        foreach ($instructors as $instructor){
            $full_name = $instructor->full_name;
        }

        return view('client.c_bookappointment', ['instructors' => $instructors, ]);
    }

    public function appointment_form($ptid)
    {
        // $personal_trainers = PersonalTrainer::get();
        $instructors = Instructor::select('*')
            ->where('id', $ptid)
            ->get();

        foreach ($instructors as $instructor){
            $full_name = $instructor->full_name;
        }

        // $personal_trainer = PersonalTrainer::select('*')
        //     ->where('id', $ptid)
        //     ->get();

        return view('client.c_book_appointment_form', ['instructors' => $instructors, 'fullname' => $full_name, 'ptid' => $ptid]);
        // return view('client.c_book_appointment_form');
    }

    public function insert_appointment(Request $request) {
        $cid = Auth::guard('client')->user()->id;
        $appts = Appointment::select('*')
            ->where('client_id', $cid)
            ->get();

        $apptid = '';
        foreach ($appts as $appt){
            $apptid = $appt->id;
        }

        if ($apptid == null){
            $data = $request->validate([
                'client_id' => 'required|integer',
                'medical_condition' => 'required|string',
                'target' => 'required|string',
                'instructor_id' => 'required|integer',
                'appointment_date' => 'required|string',
                'appointment_time' => 'required|string',
                // add other fields validations
            ]);
    
            $newData = Appointment::create($data);
            
            if ($newData) {
                // return response()->json(['message' => 'Appointment submitted!']);
                return redirect()->route('client.home')->with('message', 'record inserted successfully');
            } else {
                return response()->json(['message' => 'Error submitting appointment.'], 500);
            }
        }
        else{
            return redirect()->route('client.home')->with('message', 'Client already booked an appointment.');
        }

        
    }

    public function view_appointment(){
        $appointments = Appointment::select('*')
            ->join('instructors', 'instructors.id', '=', 'appointments.instructor_id')
            ->where('countries.country_name', 'cdcd')
            ->get();
        return view('client.c_appointments', ['appointments' => $appointments]);
    }
    

    public function index()
    {
        $appointments = Appointment::paginate(5);
        // You can replace 'Appointment' with your actual model name if it's different.

        return view('admin.appointment_index', compact('appointments'));
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    
    public function show(string $id)
    {
        $appointment = Appointment::findOrFail($id); // Retrieve the appointment by its ID
    
        return view('admin.appointment_view', compact('appointment'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $appointments = Appointment::where('id', 'like', '%' . $searchTerm . '%')
            ->orWhere('client_id', 'like', '%' . $searchTerm . '%')
            ->orWhere('medical_condition', 'like', '%' . $searchTerm . '%')
            ->orWhere('target', 'like', '%' . $searchTerm . '%')
            ->orWhere('instructors_id', 'like', '%' . $searchTerm . '%')
            ->orWhere('appointment_time', 'like', '%' . $searchTerm . '%')
            ->orWhere('created_at', 'like', '%' . $searchTerm . '%')
            ->orWhere('updated_at', 'like', '%' . $searchTerm . '%')
            ->get();
    
        return view('admin.appointment_index', compact('appointments'));
    }
    
    public function trash(): View
    {
        $appointment = Appointment::onlyTrashed()->get();
    
        return view('admin.appointment_trash', compact('appointment'));
    }

    public function destroy($id): RedirectResponse
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete(); // Soft delete
    
        return redirect()->route('appointments.index')->with('success', 'Appointment Deleted successfully');
    }
    
    public function restore($id): RedirectResponse
    {
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->restore();
    
        return redirect()->route('appointments.index')->with('success', 'Appointment restored successfully');
    }



    public function forceDelete($id): RedirectResponse
    {
        $appointment = Appointment::onlyTrashed()->findOrFail($id);
        $appointment->forceDelete(); // Permanently delete

        return redirect()->route('appointments.trash')->with('success', 'Appointment permanently deleted');
    }
}
