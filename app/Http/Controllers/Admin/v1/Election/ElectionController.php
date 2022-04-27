<?php

namespace App\Http\Controllers\Admin\v1\Election;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\Admin\CandidateModel;
use App\Models\ElectionModel;
use Illuminate\Http\Request;
use function response;

class ElectionController extends Controller
{
    public function search(){
        $data = ElectionModel::all();

        if(!$data==null){
            return response([
                'success'=>$data
            ], 200);
        }
        return response([
            'error'=>'Something went wrong. Please try again later'
        ], 500);
    }

    //election creation
    public function createElection(Request $request){

    }

    private function hasNoCandidate(){
        return CandidateModel::where('election_id', Util::getCurrentElection())->count() < 1;
    }

}
