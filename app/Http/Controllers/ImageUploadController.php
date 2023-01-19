<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    function modal()
    {

        return view('modal.modal');
    }

    public function file_store(Request $request)
    {

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();


        if (ImageUpload::where('filename', $imageName)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Image already exists',
                'data' => \null,
            ]);
        }

        $image->move(public_path('images'), $imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json([
            'status' => true,
            'message' => 'Image uploaded successfully',
            'data' => asset('img/' . $imageName)
        ]);
    }




    /**
     * Display a listing of the resource.
     */
    public function showAll()
    {
        return \response()->json(ImageUpload::latest('id')->paginate(20));
    }
}
