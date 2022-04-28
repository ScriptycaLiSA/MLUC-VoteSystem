<?php

namespace App\Http\Controllers\Admin\v1\Election;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\Admin\CandidateModel;
use App\Models\ElectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function response;

class StartElectionController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validateRequest($request);

        if ($this->hasNoNominee())
            return response()->json([
                'status' => 'failed',
                'message' => 'There is no nominees'
            ]);

        if ($this->isElectionStarted())
            return response()->json([
                'status'  =>  'failed',
                'message'  =>  'Election has already started'
            ]);

        $election = ElectionModel::find(Util::getCurrentElection())
            ->update([
                'status'=>2,
                'start'=>date('Y-m-d H:i:s'),
                'name'=>$request->name
            ]);


        return response()->json([
            'status'  =>  'success',
            'message'  => 'Election has started.',
            'election'  => ElectionModel::find(Util::getCurrentElection())
        ]);
    }

    private function hasNoNominee()
    {
        return CandidateModel::where('election_id', Util::getCurrentElection())->count() < 1;
    }

    private function isElectionStarted()
    {
        return Util::getElectionStatus() == 2;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateRequest($request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'password'  =>  "required|password:users,password, $id"
        ]);
    }
}
