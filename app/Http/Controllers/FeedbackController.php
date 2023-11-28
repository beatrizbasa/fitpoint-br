<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\Feedbacks;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedbacks::paginate(5); // 10 instructors per page
        return view('admin.f_index', compact('feedbacks'));
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
        $feedback = Feedbacks::findOrFail($id);
        $feedback ->delete(); // Soft delete
    
        return redirect()->route('feedback.index')->with('success', 'Instructor Deleted successfully');
    }
}
