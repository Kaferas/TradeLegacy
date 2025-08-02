<?php

namespace App\Http\Controllers;

use App\Models\Librairie;
use App\Http\Requests\StoreLibrairieRequest;
use App\Http\Requests\UpdateLibrairieRequest;

class LibrairieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.librairie.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.librairie.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibrairieRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Librairie $librairie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Librairie $librairie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibrairieRequest $request, Librairie $librairie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Librairie $librairie)
    {
        //
    }
}
