<?php

namespace App\Http\Controllers\Voter\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilityElection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingLeaderboardController extends Controller
{
    public function getVotingResultSchema(Request $request){
        $voterAcct = $request->all();

        if (UtilityElection::hasVoted($voterAcct['id'])) {
            $votes = DB::table('voting_results')
                ->where('voter_id',$voterAcct['id'])
                ->first();

            return response([
                'votes'=>$votes,
            ], 202);
        }

        return response([
            'message' => 'There`s no voting event in your college as for now...'
        ], 202);
    }

    public function voterLeaderboard(Request $request)
    {
        $data = $request->validate([
            'election_id' => ['required']
        ]);

        if (UtilityElection::getActiveElection($data['election_id']) == "1") {
            return response([
                'success' => UtilityElection::getFinalResult($data['election_id']),
            ], 200);

        } else if (UtilityElection::getActiveElection($data['election_id']) == "0") {
            return response([
                'success' => 'Election has not been started yet'
            ], 200);
        } else {
            return response([
                'error' => 'Election not found in the records!'
            ], 404);
        }
    }
}
