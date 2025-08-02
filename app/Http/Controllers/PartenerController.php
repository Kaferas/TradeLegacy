<?php

namespace App\Http\Controllers;

use App\Models\parteners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartenerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parteners=parteners::where('deleted_status',0)->orderBy('id','desc')->get();
        return view("admin.parteners.index",['parteners'=>$parteners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.parteners.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3|max:255',
            'link_partener' => 'required|url',
            'icon_partener' => 'required|image|mimes:jpg,png,svg|max:2048',
        ], [
            'title.required' => 'The title is required.',
            'title.min' => 'The title must be at least 3 characters.',
            'link_partener.required' => 'The partner link is required.',
            'link_partener.url' => 'The partner link must be a valid URL.',
            'icon_partener.required' => 'The partner icon is required.',
            'icon_partener.image' => 'The icon must be an image (JPG, PNG, SVG).',
            'icon_partener.max' => 'The icon must not be larger than 2MB.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Store the icon image
        $iconPath = $request->file('icon_partener')->store('partners', 'public');

        // Create the partner entry in the database
        parteners::create([
            'title' => $request->title,
            'link_partener' => $request->link_partener,
            'icon_partener' => $iconPath,
        ]);
        return redirect("/partners")->with("success", "Partenaire Cree avec Success");
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
    public function edit(string $partener)
    {
       $partener=parteners::where("id",$partener)->first();
        return view("admin.parteners.edit", ['partner' => $partener]);
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
