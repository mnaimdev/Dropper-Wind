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

        $image->move(public_path('images'), $imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }
}
