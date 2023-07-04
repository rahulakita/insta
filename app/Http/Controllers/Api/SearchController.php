<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\image_upload;
use App\Models\User;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (Auth::check()) 
        {
            $search = $request -> name;
            $getid = User::select('id','name','picture')->where ('name','LIKE','%'.$search.'%')->get();
                       
            return response ()->json([
                'status' => true,
                'message' => $getid
            ], 200);
            
            



        }
    }
}
