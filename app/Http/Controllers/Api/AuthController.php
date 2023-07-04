<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //validasi

    //save user
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request -> username,           
            'password' => Hash::make($request->password),
            'phone' => $request -> phone,
            'name' => $request -> name,
            'birth' => $request -> birth
        ]);
        return response () ->json([
            'status' => true,
            'message' => 'Registration Succesfull'
        ], 200);
    }
    // login
    public function login(Request $request)
    {
        // validation

        // validation phone password
        if (!Auth::attempt(['phone'=> $request->phone,'password' => $request->password])) {
            return response() -> json ([
                'status' => false,
                'message' => 'Phone Password Invalid'
            ], 400);
        }
        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()-> json([
            'status'=> true,
            'message'=> 'Login Succesful',
            'user' => Auth::user(),
            'token' => $token
        ], 200);

    }
    public function profile()
    {
        return response()->json([
            'status' => true,
            'message'=> 'Profile pengguna.',
            'user'=> Auth::user()
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            'status' => true,
            'message'=>'Logout Successfully'
        ], 200);
    }
}
