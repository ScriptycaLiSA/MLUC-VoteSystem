<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartLayoutController extends Controller
{
    public function parseChartJson(Request $request)
    {
        $data = $request->validate([
            'election_id' => ['required']
        ]);

        if (UtilityElection::getActiveElection($data['election_id']) == "1") {
            $candidates = DB::table('voting_results')
                ->join('candidate_models','voting_results.candidate_id','=','candidate_models.id')
                ->select(DB::raw('candidate_models.cand_name'))
                ->groupBy( 'voting_results.candidate_id')
                ->where('voting_results.election_id', $data['election_id'])
                ->get('voting_results.candidate_id');

            return response([
                'success'=>[
                    'candidates'=>$candidates,
                ]
            ]);
        }
        else if (UtilityElection::getActiveElection($data['election_id']) == "0") {
            return response([
                'success' => 'Election has not been started yet'
            ], 200);
        }
    }
}
