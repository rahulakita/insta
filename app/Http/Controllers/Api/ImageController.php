<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\image_upload;
use App\Models\User;

class ImageController extends Controller
{
    public function view()
    {
       //view picture
        if (Auth::check()) 
        {
            $phones = Auth::user()->phone;
            $image_name = image_upload::select('image_name')->where ('phone',$phones)->get();
            return response ()->json([
                'status' => true,
                'phone' => $phones,
                'message' => $image_name
            ], 200);
            
            



        }
    }
}