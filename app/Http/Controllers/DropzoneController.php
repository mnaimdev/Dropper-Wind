<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;

class DropzoneController extends Controller
{

    function upload()
    {
        return view('image.upload',);
    }

    function drag_upload(Request $request)
    {

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();

        if (ImageUpload::where('filename', $imageName)->count() > 0) {
            return response()->json([
                'status' => false,
                'data' => null,
            ]);
        }

        $image->move(public_path('img'), $imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json([
            'status' => true,
            'data' => asset('img/' . $imageName)
        ]);
    }


    function all_info()
    {
        $latest_img = ImageUpload::latest('id')->paginate(20);
        return $latest_img;
    }
}
