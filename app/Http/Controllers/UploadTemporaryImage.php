<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImage;
use Illuminate\Http\Request;

class UploadTemporaryImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->hasFile('pictures')){
                $image=is_array($request->all()['pictures']) ? $request->all()['pictures'][0] : $request->all()['pictures'];
                $fileName =$image->getClientOriginalName();
                $folder=uniqid('image-',true);
                $image->storeAs('images/tmp'.$folder,$fileName);
                TemporaryImage::create([
                    'folder'=>$folder,
                    'file'=> $fileName
                ]);
                return $folder;
            }
        return "";
    }
}
