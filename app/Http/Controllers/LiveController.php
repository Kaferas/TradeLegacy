<?php

namespace App\Http\Controllers;

use App\Models\Live;
use App\Http\Requests\StoreLiveRequest;
use App\Http\Requests\UpdateLiveRequest;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lives = Live::where('DELETED_STATUS', 0)->get();
        return view("admin.live.index", ['lives' => $lives]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.live.add");
    }

    public function online(Live $live)
    {
        $type = $live->type_social;
        Live::where("is_live", 1)->where('type_social', $type)->update(['is_live' => 0]);
        $live->update(['is_live' => 1]);
        return redirect("live")->with("update", "Live mise en Ligne");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLiveRequest $request)
    {
        Live::create($request->validated());
        return redirect("/live")->with("success", "Live Cree avec Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Live $live)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Live $live)
    {
        //
        return view("admin.live.edit", ['live' => $live]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLiveRequest $request, Live $live)
    {
        $live->update([
            'title' => $request->get('title'),
            'link_youtube' => $request->get('link_youtube'),
            'type_social' => $request->get('type_social'),
            'description_youtube' => $request->get('description_youtube'),
        ]);
        return redirect("live")->with("update", "Live mise a Jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Live $live)
    {
        $live->update([
            'DELETED_STATUS' => 1
        ]);
        return redirect("live")->with("delete", "Live Supprime avec Success");
    }
}
