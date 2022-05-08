<?php

namespace App\Http\Controllers\Voter\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilityElection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function viewElection(Request $request){
        $voterAcct = $request->validate([
            'id'=>['required'],
            'college_init'=>['required','string']
        ]);

        if(UtilityElection::hasVoted($voterAcct['id'])){
            return response([
                'message'=> 'You have already voted!'
            ],200);
        }
        elseif(UtilityElection::getCollege($voterAcct['college_init'])){
            $ballotList = DB::table('candidate_models')
                ->where('college_init',$voterAcct['college_init'])
                ->join('position_models','candidate_models.position_id','=','position_models.id')
                ->select('candidate_models.*','position_models.pos_name')
                ->orderBy('position_id')
                ->get();

            return response([
                'message'=>$ballotList
            ],200);
        }

        return response([
            'message'=>'There`s no voting event yet!'
        ], 200);
    }

    private function getBallotList(){

    }
}
