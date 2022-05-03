<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\CandidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignSiteController extends Controller
{
    public function fetchCandidateData(){
        $data = DB::table('candidate_models')
            ->join('position_models', 'candidate_models.position_id', '=', 'position_models.id')
            ->join('election_models', 'candidate_models.election_id', '=', 'election_models.id')
            ->select('candidate_models.*', 'position_models.pos_name', 'election_models.elec_name')
            ->get();

        try {
            if (!$data == null) {
                return response([
                    'success' => $data
                ], 200);
            }
        } catch (\Throwable $e) {
            return response([
                'error' => 'Something went wrong. Please try again later or reload the page!'
            ], 500);
        }
        return response([
            'error' => 'Something went wrong. Please try again later or reload the page!'
        ], 500);
    }
}
