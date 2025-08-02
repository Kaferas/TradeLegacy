<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideRequest;
use App\Http\Resources\SlideResource;
use App\Models\Slider;
use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
public function index()
{
    $slides=Slider::where('status',0)->orderBy('id','DESC')->get();
    return view("admin.slides.index",['slides'=>$slides]);
    // return SlideResource::collection(Slider::all());
}
public function create(){
    return view("admin.slides.add");
}

public function store(SlideRequest $request)
{
    $slide=new Slider();
    $temporaries_images =TemporaryImage::all();
    $slides_array=[];
    if (!empty($request->pictures)) {
        foreach ($temporaries_images as $picture) {
            Storage::copy("images/tmp".$picture->folder."/".$picture->file, "public/uploads/sliders/".$picture->folder."/".$picture->file);
            array_push($slides_array, [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $picture->folder."/".$picture->file,
                'status' => 0,
                'created_at' => date("d-m-y h:i:s"),
            ]);
            Storage::deleteDirectory('images/tmp'.$picture->folder);
        }
        Slider::insert($slides_array);
        TemporaryImage::truncate();
    }
    return redirect()->route("slides.index");
}

public function show(Slider $slide)
{
    return new SlideResource($slide);
}

public function update(SlideRequest $request, Slider $slide)
{
    $slide->update($request->validated());
    return new SlideResource($slide);
}

public function destroy(Slider $slide)
{
    $slide->update(['status'=>'1']);
    return redirect()->route("slides.index");
}
public function toggleStatus(Slider $slide)
{
    $slide->status = !$slide->status;
    $slide->save();
    return new SlideResource($slide);

}
}
