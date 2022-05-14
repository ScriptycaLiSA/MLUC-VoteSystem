<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminAcctModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'   => 'required|email|string',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return response([
                'errors' => 'This account is not existing or check your inputs!'
            ], 422);
        }

        $user = Auth::user();
        $token = $user->createToken('main',['access-admin'])->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ],200);
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->user()->currentAccessToken()->delete();

        return response([
            'success'=>'You have successfully logged out. Please log-in again!'
        ],200);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $adminCreateAcct = DB::table('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
        return response([
            'success'=>'An admin account has been created!',
            'account' => $adminCreateAcct,
        ]);
    }

}
