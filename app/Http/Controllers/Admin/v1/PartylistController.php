<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\PartylistModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function createPartylist(Request $request){
        $data = $request->only('name');

        if(!$data==null){
            DB::table('partylist_models')->insert([
                'name'=>$data,
            ]);
            return response([
                'success'=>'Partylist has been added!',
                'partylist_name'=>$data
            ], 201);
        }
        return response([
            'error'=>'Something went wrong. Please try again later!'
        ], 500);
    }
}
