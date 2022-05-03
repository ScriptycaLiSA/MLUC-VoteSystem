<?php

namespace App\Http\Controllers\Admin\v1\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Admin\CandidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use function response;

class CandidateControllers extends Controller
{
    public function getRecords()
    {
        $data = DB::table('candidate_models')
            ->join('position_models', 'candidate_models.position_id', '=', 'position_models.id')
            ->join('election_models', 'candidate_models.election_id', '=', 'election_models.id')
            ->select('candidate_models.*', 'position_models.pos_name', 'election_models.elec_name')
            ->get();

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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createCandidate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'college_init' => 'required|string',
            'election_id' => 'required',
            'partylist_id' => 'required',
            'position_id'=>'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max:5120',
            'description' => 'required|string'
        ]);

        $image = $request->file('image');
        $name = time() . '_' . $request->name . '_' . $request->college_init .  '_cand' . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save(public_path('img/profile/') . $name);
        $request->merge(['image' => $name]);


        try {
            if (!$request == null) {
                DB::table('candidate_models')->insert([
                    'cand_name' => $request->name,
                    'college_init' => $request->college_init,
                    'election_id' => $request->election_id,
                    'partylist_id' => $request->partylist_id,
                    'position_id'=> $request->position_id,
                    'image' => $name,
                    'description' => $request->description
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
