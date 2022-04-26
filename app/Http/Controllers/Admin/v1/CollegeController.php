<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\CollegesModel;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index(){
        $data = CollegesModel::all();

        if(!$data==null){
            return response([
                'success'=>$data,
            ], 200);
        }

        return response([
            'success'=>'Something went wrong. Please try again later!'
        ], 500);
    }
}
