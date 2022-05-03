<?php

namespace App\Http\Controllers\Admin\v1\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Admin\CandidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function response;

class CandidateControllers extends Controller
{
    public function getRecords()
    {
        $data = DB::table('candidate_models')->get();

        try {
            if (!$data == null) {
                return response([
                    'success' => $data
                ], 200);
            }
        } catch (\Throwable $e) {
            return response([
                'error' => 'Something went wrong. Please try again later or reload the page!'
            ], 500);
        }
        return response([
            'error' => 'Something went wrong. Please try again later or reload the page!'
        ], 500);
    }

    public function createCandidate(Request $request)
    {
        $data = $request->all();

        try {
            if (!$data == null) {
                DB::table('candidate_models')->insert([
                    'name' => $data['name'],
                    'college_init' => $data['college_init'],
                    'election_id' => $data['election_id'],
                    'partylist_id' => $data['partylist_id'],
                    'description'=>$data['description']
                ]);
                return response([
                    'success' => 'Candidate record has been inserted! Please refresh the page',
                ], 201);
            }
        } catch (\Throwable $e) {
            return response([
                'error' => 'Something went wrong. Please try again later or reload the page!'
            ], 500);
        }
        return response([
            'error' => 'Something went wrong. Please try again later or reload the page!'
        ], 500);
    }
}
