<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Contact::orderBy("id", "DESC")->get();
        return view("admin.contact.index",['contacts' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'customer_mail' => 'required|email',
            'customer_service' => 'required|string',
            // 'service_date' => 'required|string',
            'customer_phone' => 'required|string',
            'message' => 'nullable|string',
        ]);
        Contact::create($validated);

        return redirect()->route('home')->with('success', "Message envoye avec Success");
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
        $customerRequest = Contact::findOrFail($id);
        $customerRequest->delete();
        return redirect()->route('contact.index')->with('success', 'Request deleted successfully.');
    }
}
