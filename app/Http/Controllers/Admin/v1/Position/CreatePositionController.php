<?php

namespace App\Http\Controllers\Admin\v1\Position;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\Admin\PositionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreatePositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validateRequest($request);
        $this->insertPosition($request);

        return response([
            'status' => 'Position has been inserted'
        ], 201);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    private function validateRequest($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'election_id' => [
                Rule::unique('position_models')->where(function ($query) {
                    $query->where('id', Util::getCurrentElection());
                })
            ]
        ]);
    }

    private function insertPosition($request)
    {
        $position = $request->all();
        $position['election_id'] = Util::getCurrentElection();
        PositionModel::create($position);
    }
}
