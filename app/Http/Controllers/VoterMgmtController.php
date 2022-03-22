<?php

namespace App\Http\Controllers;

use App\Models\VoterAcctModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\VoterModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class VoterMgmtController extends Controller
{
    use HasFactory;

    public function getVoterInfo($idNum)
    {
        $voter = DB::table('voter_models')->where('idNum', $idNum)->first();
        if ($voter == null) {
            return response([
                'error' => 'This student ID is not existing from the origin server!'
            ], 422);
        }
        return response([
            'studentId' => $voter
        ], 200);
    }

    public function getVoterInfoAll()
    {
        $voterInfo = VoterAcctModel::all();

        if($voterInfo==null){
            return response([
                'error' => 'No registered voters!'
            ], 422);
        }
        return response([
            'students' => $voterInfo
        ], 200);
    }

    public function registerVoterFromStud(Request $request){
        $voterCred = $request->validate([
            'fname'=>'required|string|max:20',
            'lname'=>'required|string|max:20',
            'email'=>'required|string|email|unique:voter_acct_models,email',
            'college'=>'required|string',
            'password'=>['required']
        ]);

        $voterAcctCreation = VoterAcctModel::create([
            'fname' => $voterCred['fname'],
            'lname' => $voterCred['lname'],
            'email' => $voterCred['email'],
            'college' => $voterCred['college'],
            'password' => bcrypt($voterCred['password'])
        ]);

        if($voterAcctCreation==null){
            return response([
                'error' => 'Voter account cannot being created. Try again later.'
            ], 422);
        }
        return response([
            'success'=>'Voter Account successfully created',
            'data' => $voterAcctCreation
        ]);
    }

}
