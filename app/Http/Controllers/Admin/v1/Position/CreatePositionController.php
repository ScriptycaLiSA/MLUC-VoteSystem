<?php

namespace App\Http\Controllers\Admin\v1\Position;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\Admin\PositionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreatePositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'election_id'=>'required'
        ]);

        if(!$data==null){
            DB::table('position_models')
                ->insert([
                    'name'=>$data['name'],
                    'election_id'=>$data['election_id']
                ]);

            return response([
                'success'=>[
                    'message'=>'Position has been inserted',
                    'data'=>$data
                ]
            ], 201);
        }
        return response([
            'error'=>'Something went wrong. Please try again later!'
        ], 500);
    }
}
