<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\CandidateModel;
use Illuminate\Http\Request;

class CandidateControllers extends Controller
{
    public function getRecords(){
        $data = CandidateModel::all();

        if(!$data==null){
            return response([
                'success'=>$data
            ], 200);
        }
        return response([
           'error'=>'Something went wrong. Please try again later'
        ], 500);
    }

    public function createCandidate(Request $request){
        $candidate = $request->all();


    }
}
