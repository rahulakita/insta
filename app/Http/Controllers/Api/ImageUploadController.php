<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\image_upload;

class ImageUploadController extends Controller

{
    public function imageUpload(Request $request)
    {
        if (Auth::check()) 
        {
        if ($request->has('image'))
            {
            $image = $request->image;

            foreach ($image as $key => $value) {
            $name = time().'_'.$key.'.'.$value->getClientOriginalExtension();
            $path = public_path('upload');
            $value->move($path,$name);
            $phones = Auth::user()->phone;
            $image_add = image_upload::create([
                'phone'=> $phones,
                'image_name'=> $name
            ]);
            }
            return response()->json([
                'user' => Auth::user(),
                'message' => 'Image Success',
                'status' => true
            ],200);
            }
        }
        
    }
}