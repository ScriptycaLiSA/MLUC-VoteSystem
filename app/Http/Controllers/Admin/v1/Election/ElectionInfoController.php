<?php

namespace App\Http\Controllers\Admin\v1\Election;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\Admin\CandidateModel;
use App\Models\Admin\PartylistModel;
use App\Models\Admin\PositionModel;
use App\Models\ElectionModel;
use function response;

class ElectionInfoController extends Controller
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        $id = Util::getCurrentElection();
        $information['election'] = ElectionModel::find($id);
        $information['position'] = PositionModel::where('election_id', $id)->get();
        $information['partylist'] = PartylistModel::where('election_id', $id)->get();
        $information['nominee'] = CandidateModel::where('election_id', $id)->get();
        // $information['result'] = Result::where('voter_id', Auth::id())->get();
        // $information['voter'] = Auth::user();
        return response()->json($information);
    }
}
