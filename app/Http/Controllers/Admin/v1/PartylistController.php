<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\PartylistModel;
use Illuminate\Http\Request;

class PartylistController extends Controller
{
    public function index(){
        $data = PartylistModel::all();

        if(!$data==null){
            return response([
                'success'=>$data
            ], 200);
        }
        return response([
            'error'=>'Something went wrong. Please try again later!'
        ], 500);
    }
}
