<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminAcctModel;
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
        $token = $user->createToken('Auth Token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ],200);
    }

    public function logout(Request $request){
        /** var User $user */
        Auth::logout();

        return response([
            'success'=>true
        ],200);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'imageUrl' => 'required|string',
            'email' => 'required|email|string|unique:admin_acct_models,email',
            'password' => [
                'required',
            ],
            'role' => 'required|string',
            'organization' => 'required|string',
            'canMngStd' => 'required|string',
            'canMngCand' => 'required|string',
            'canMngRtt' => 'required|string',
            'canVvto' => 'required|string',
            'canMngRtmt' => 'required|string',
            'canMngUsers' => 'required|string',
        ]);

        $adminCreateAcct = AdminAcctModel::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'imageUrl' => $data['imageUrl'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'organization' => $data['organization'],
            'canMngStd' => $data['canMngStd'],
            'canMngCand' => $data['canMngCand'],
            'canMngRtt' => $data['canMngRtt'],
            'canVvto' => $data['canVvto'],
            'canMngRtmt' => $data['canMngRtmt'],
            'canMngUsers' => $data['canMngUsers']
        ]);

        $token = $adminCreateAcct->createToken('Auth Token')->accessToken;

        return response([
            'account' => $adminCreateAcct,
            'token' => $token
        ]);
    }

}
