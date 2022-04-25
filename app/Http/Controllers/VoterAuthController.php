<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VoterModel;
use App\Models\VoterAcctModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class VoterAuthController extends Controller
{

    //Voter verification endpoint
    public function voterLogin(Request $request)
    {
        $parseId = $request->validate([
            'idNum' => 'required',
            'password' => "required",
            'email' => 'email'
        ]);
        /*$parseEmail = $request->validate([
            'email' => 'required|email|max:52'
        ]); */

        if (VoterAcctModel::where('idNum', $parseId)->count() > 0) {
            if(!Auth::guard('voter')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])){
                return response([
                    'success'=>'Voter has been logged in!',
                ],200);
            } else {
                return response([
                    'error'=>'Wrong Password! Please check your inputs'
                ],404);
            }
        } elseif (VoterModel::where('idNum', $parseId)->count() > 0) {
            return response([
                'success' => 'Please enter your email to activate this account!'
            ], 200);
        } else {
            return response([
                'error' => 'ID Number is not existing. Please contact MIS for ID'
            ], 404);
        }
    }
}
