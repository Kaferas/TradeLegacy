<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view("admin.settings.index",['services'=>$services,'count' => count($services)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.settings.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'installed_kwh' => 'required|string|max:255',
            'vehicle_devices' => 'required|string|max:255',
            'auto_eoms' => 'required|string|max:255',
            'experience_year' => 'required|integer',
        ], [
            // Custom validation messages
            'installed_kwh.required' => 'The installed KWh is required.',
            'experience_year.required' => 'Annee d\'experience requis',
            'installed_kwh.string' => 'The installed KWh must be a string.',
            'installed_kwh.max' => 'The installed KWh may not be greater than 255 characters.',
            'installed_kwh.max' => 'The installed KWh may not be greater than 255 characters.',
            'experience_year.integer' => 'Annee d\'experience doit etre un entier.',

            'vehicle_devices.required' => 'The vehicle devices are required.',
            'vehicle_devices.string' => 'The vehicle devices must be a string.',
            'vehicle_devices.max' => 'The vehicle devices may not be greater than 255 characters.',

            'auto_eoms.required' => 'The auto EOMS is required.',
            'auto_eoms.string' => 'The auto EOMS must be a string.',
            'auto_eoms.max' => 'The auto EOMS may not be greater than 255 characters.',
        ]);
        Service::create([
            'installed_kwh' => $validated['installed_kwh'],
            'vehicle_devices' => $validated['vehicle_devices'],
            'auto_eoms' => $validated['auto_eoms'],
            'experience_year' => $validated['experience_year'],
        ]);
        return redirect()->route("settings.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $service)
    {
        $service = Service::where("id",$service)->first();
        return view("admin.settings.edit", ['setting' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $service)
    {
        $validated = $request->validate([
            'installed_kwh' => 'required|string|max:255',
            'vehicle_devices' => 'required|string|max:255',
            'auto_eoms' => 'required|string|max:255',
        ]);

        if($validated){
            Service::where("id",$service)->update($validated);
        }
        return redirect()->route('settings.index')
            ->with('success', 'Settings updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
