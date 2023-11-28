<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkoutController extends Controller
{
    public function adding_workout(Request $request) {
        $ptid = Auth::guard('instructor')->user()->id;

        Workout::insert([
            'client_id' => $request ->client_id,
            'instructor_id' => $ptid,
            'workout_date' => $request->workout_date,
            'focus' => $request->focus,
            'exercises' => $request->exercises,
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('instructor.workout_plans')->with('message', 'record inserted successfully');
    }

    public function delete_workout($id) {
        Workout::where('id', '=', $id)->delete();

        return redirect()->route('instructor.workout_plans')->with('message', 'record deleted successfully');
            
    }

    public function show_edit(Request $request, $id){
        $workouts = Workout::join('clients', 'clients.id', '=', 'workouts.client_id')
            // ->join('instructors', 'instructors.id', '=', 'workouts.instructor_id')
            ->select('workouts.id', 'clients.firstname as c_firstname', 'clients.lastname as c_lastname', 'workouts.workout_date', 'workouts.focus', 'workouts.exercises')
            ->where('workouts.id', $id)
            ->get();
        
        return view('instructor.i_workout_edit',['workouts'=>$workouts]);
        // }
    }

    public function editing_workout(Request $request, $id) {
        
        Workout::where('id', $id)
            ->update([
                'workout_date' => $request->input('workout_date'),
                'focus' => $request->input('focus'),
                'exercises' => $request->input('exercises'),
            ]);
        return redirect()->route('instructor.workout_plans')->with('message', 'record updated successfully');
    }
}
