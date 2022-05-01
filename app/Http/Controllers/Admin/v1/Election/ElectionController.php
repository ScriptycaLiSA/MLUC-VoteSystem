<?php

namespace App\Http\Controllers\Admin\v1\Election;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilityElection;
use App\Models\Admin\CandidateModel;
use App\Models\ElectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function response;

class ElectionController extends Controller
{
    public function search()
    {
        $data = ElectionModel::all();

        if (!$data == null) {
            return response([
                'success' => $data
            ], 200);
        }
        return response([
            'error' => 'Something went wrong. Please try again later'
        ], 500);
        //please add the number of candidates that participated in election later
    }

    //election creation
    public function createElection(Request $request)
    {
        $data = $request->only('name','college_init');

        if (!$data == null) {
            try{
                DB::table('election_models')->insert([
                    'name' => $data['name'],
                    'college_init' => $data['college_init']
                ]);
                return response([
                    'success' => 'Election has been inserted! Please refresh the page!',
                ], 201);
            }catch(\Throwable $exception){
                return response()->json([
                    'error'=>'Something went wrong. Please try again later!'
                ], 500);
            }
        }
        return response([
            'error' => 'Something went wrong. Please try again later!'
        ], 500);
    }

    public function deleteElection(Request $request){
        $data = $request->only('id');

        if(!$data==null){
            try{
                DB::table('election_models')
                    ->where('id',$data['id'])
                    ->delete();
                return response([
                    'success' => 'Election has been deleted! Please refresh the page later',
                ], 200);
            }catch(\Throwable $exception){
                return response()->json([
                    'error'=>'Something went wrong. Please refresh the page later'
                ], 500);
            }
        }
        return response([
            'error'=>'Something went wrong. Please restart the page'
        ], 500);
    }

    private function hasNoCandidate()
    {
        return CandidateModel::where('election_id', Util::getCurrentElection())->count() < 1;
    }

}
