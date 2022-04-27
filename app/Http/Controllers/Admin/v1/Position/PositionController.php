<?php

namespace App\Http\Controllers\Admin\v1\Position;

use App\Http\Controllers\Controller;
use App\Models\Admin\PositionModel;
use function response;

class PositionController extends Controller
{
    public function index(){
        $data = PositionModel::all();

        if(!$data==null){
            return response([
                'success'=>$data
            ], 200);
        }
        return response([
            'error'=>'Something went wrong. Please try again later!'
        ]);
    }
}
