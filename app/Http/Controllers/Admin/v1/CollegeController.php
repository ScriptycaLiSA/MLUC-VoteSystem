<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Admin\CollegesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function sortedDataForColleges(){
        $data = DB::table('colleges_models')
            ->join('voter_acct_models','colleges_models.initials','=','voter_acct_models.college_init')
            ->select(DB::raw('voter_acct_models.college_init,colleges_models.coll_name,count(*) as registered'))
            ->groupBy('voter_acct_models.college_init','colleges_models.coll_name')
            ->orderBy('registered')
            ->get();

        $data2 = DB::table('colleges_models')
            ->join('voter_models','colleges_models.coll_name','=','voter_models.college')
            ->select(DB::raw('voter_models.college,colleges_models.initials,count(*) as prereg'))
            ->groupBy('voter_models.college','colleges_models.initials')
            ->orderBy('prereg')
            ->get();

        if(!$data==null&&!$data2==null){
            return response([
                'success'=>$data,
                'success1'=>$data2
            ], 200);
        }

        return response([
            'success'=>'Something went wrong. Please try again later!'
        ], 500);
    }
}
