<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\PersonalTrainer;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function book_appointment()
    {
        $personal_trainers = PersonalTrainer::get();
        
        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }

        return view('client.c_bookappointment', ['personal_trainers' => $personal_trainers, 'fullname' => $full_name]);
    }

    public function appointment_form($ptid)
    {
        // $personal_trainers = PersonalTrainer::get();
        $personal_trainers = PersonalTrainer::select('*')
            ->where('id', $ptid)
            ->get();

        foreach ($personal_trainers as $personal_trainer){
            $full_name = $personal_trainer->full_name;
        }

        // $personal_trainer = PersonalTrainer::select('*')
        //     ->where('id', $ptid)
        //     ->get();

        return view('client.c_book_appointment_form', ['personal_trainers' => $personal_trainers, 'fullname' => $full_name, 'ptid' => $ptid]);
        // return view('client.c_book_appointment_form');
    }

    public function insert_appointment(Request $request) {
        $data = $request->validate([
            'client_id' => 'required|integer',
            'medical_condition' => 'required|string',
            'target' => 'required|string',
            'personal_trainer_id' => 'required|integer',
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

    public function view_appointment(){
        $appointments = Appointment::select('*')
            ->join('personal_trainers', 'personal_trainers.id', '=', 'appointments.personal_trainers_id')
            ->where('countries.country_name', 'cdcd')
            ->get();
        return view('client.c_appointments', ['appointments' => $appointments]);
    }
}
