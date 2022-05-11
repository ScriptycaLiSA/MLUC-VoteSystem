<?php

namespace App\Http\Controllers\Voter\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilityElection;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function viewElection(Request $request)
    {
        $voterAcct = $request->validate([
            'id' => ['required'],
            'college_init' => ['required', 'string']
        ]);

        if (UtilityElection::hasVoted($voterAcct['id'])) {
            return response([
                'message' => 'You have already voted!'
            ], 202);
        } elseif (UtilityElection::getCollege($voterAcct['college_init'])) {
            $ballotList = DB::table('candidate_models')
                ->where('college_init', $voterAcct['college_init'])
                ->join('position_models', 'candidate_models.position_id', '=', 'position_models.id')
                ->join('partylist_models', 'candidate_models.partylist_id', '=', 'partylist_models.id')
                ->select('candidate_models.*', 'position_models.pos_name', 'partylist_models.party_name')
                ->orderBy('position_id')
                ->get();

            return response([
                'message' => $ballotList,
            ], 200);
        }

        return response([
            'message' => 'There`s no voting event in your college as for now...'
        ], 202);
    }

    //sending arrays of votes?
    public function castVote(Request $request)
    {
        if (!$request == null) {
            DB::table('voting_results')->insert([
                'voter_id' => Auth::id(),
                'position_id' => UtilityElection::getPositionInElections($request['candidate_id']),
                'candidate_id' => $request['candidate_id'],
                'election_id' => UtilityElection::getCurrentElections($request['candidate_id'])
            ]);

            return response([
                'success' => 'Your vote has been casted!'
            ], 201);
        }

        return response([
            'error' => 'Something went wrong. Please try again later...'
        ], 500);
    }
}
