<?php

namespace App\Http\Controllers\Admin\v1\Election;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilityElection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectionResultController extends Controller
{
    public function searchElectionResults(Request $request)
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
        }
    }
}
