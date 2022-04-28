<?php

namespace App\Http\Controllers\Admin\v1\Position;

use App\Http\Controllers\Controller;
use App\Models\Admin\PositionModel;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function index()
    {
        $data = PositionModel::all();

        if (!$data == null) {
            return response([
                'success' => $data
            ], 200);
        }
        return response([
            'error' => 'Something went wrong. Please try again later!'
        ]);
    }

    public function createPosition(Request $request){
        $data = $request->only('name');

        if(!$data==null){
            DB::table('position_models')->insert([
                'name'=>$data['name'],
            ]);
            return response([
                'success'=>[
                    'message'=>'Position has been inserted!',
                    'position_name'=>$data
                ]
            ],201);
        }
        return response([
            'error'=>'Something went wrong. Please try again later!'
        ],500);
    }
}
