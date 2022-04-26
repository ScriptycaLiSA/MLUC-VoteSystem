<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\CandidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignSiteController extends Controller
{
    public function fetchCandidateData(){
        $data = CandidateModel::all();
        return response([
           'candidates'=>$data
        ], 200);
    }
}
