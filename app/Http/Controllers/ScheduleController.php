<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::count();
        $allSchedules = Schedule::orderBy("id", "DESC")->get();
        return view("admin.schedule.index",['isEmpty' => $schedules,'schedules' => $allSchedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.schedule.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'normal_from' => 'required|date_format:H:i',
            'normal_to' => 'required|date_format:H:i',
            'weekend_from' => 'required|date_format:H:i',
            'weekend_to' => 'nullable|date_format:H:i',
        ]);
        Schedule::create($validated);
        return redirect()->route("schedule.index")->with('success', "Horaire Cree avec Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $schedule)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view("admin.schedule.edit",['schedule' => $schedule]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated=$request->validate([
            'normal_from' => 'required|date_format:H:i',
            'normal_to' => 'required|date_format:H:i',
            'weekend_from' => 'required|date_format:H:i',
            'weekend_to' => 'nullable|date_format:H:i',
        ]);
        $schedule->update($validated);
        return redirect()->route("schedule.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
