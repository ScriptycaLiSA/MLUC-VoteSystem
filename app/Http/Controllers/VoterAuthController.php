<?php

namespace App\Http\Controllers;

use App\Models\VoterAcctModel;
use App\Models\VoterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoterAuthController extends Controller
{
    public function voterLogin(Request $request)
    {
        $credentials = $request->validate([
           'idNum'=>['required'],
           'password'=>['required']
        ]);

        $testIfAcct = VoterModel::where('idNum', $credentials['idNum'])->first();

        if(!Auth::guard('voter')->attempt($credentials)){
            if ($testIfAcct===null){
                return response([
                    'errors'=>'You cannot logged in because you are in pre-register. Please register your account'
                ], 422);
            }
            else{
                return response([
                    'errors'=>'Wrong inputs.Please try again.'
                ], 422);
            }
        }

        $voter = Auth::guard('voter')->user();
        $token = $voter->createToken('main',['access-voter'])->plainTextToken;

        return response([
            'voter' => $voter,
            'token'=> $token
        ],200);
    }

    public function voterLogout(Request $request){
        Auth::guard('voter')->logout();

        return response([
            'success'=>'You have successfully logged out. Please log-in again!'
        ],200);
    }
}
