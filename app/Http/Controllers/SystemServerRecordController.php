<?php

namespace App\Http\Controllers;

use App\Models\VoterMgmtImport;
use App\Models\VoterModel;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\VoterAcctModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SystemServerRecordController extends Controller
{
    use HasFactory;

    public function saveRecordsFromOrigin(Request $request)
    {
        $csvValidate = $request->validate([
            'file'=>'required|max:5120'
        ]);

        if(!$csvValidate==null){
            Excel::import(new VoterMgmtImport, $request->file('file'));

            $dataLoaded = DB::table('voter_models')->count();
            $preRegisteredVoters = DB::table('voter_models')->count();
            $registeredVoters = DB::table('voter_acct_models')->count();
            DB::table('mstr_updts')->upsert([
                ['id' => 1, 'eventName' => 'data loaded', 'value' => $dataLoaded],
                ['id' => 2, 'eventName' => 'pre-registered voters', 'value' => $preRegisteredVoters],
                ['id' => 3, 'eventName' => 'registered voters', 'value' => $registeredVoters]
            ], ['eventName', 'id'], ['value']
            );
            return response([
                'success' => 'The system database has been updated!'
            ], 201);
        }

        return response([
            'error'=>'Something went wrong. Try again later'
        ], 200);
    }


    public function mstrUpdtDash()
    {
        $dataLoaded = DB::table('voter_models')->count();
        $preRegisteredVoters = DB::table('voter_models')->count();
        $registeredVoters = DB::table('voter_acct_models')->count();
        DB::table('mstr_updts')->upsert([
            ['id' => 1, 'eventName' => 'data loaded', 'value' => $dataLoaded],
            ['id' => 2, 'eventName' => 'pre-registered voters', 'value' => $preRegisteredVoters],
            ['id' => 3, 'eventName' => 'registered voters', 'value' => $registeredVoters]
        ], ['eventName', 'id'], ['value']
        );

        $eventTitle = DB::table('mstr_updts')->get();

        if (!$eventTitle == null) {
            return response([
                'title' => $eventTitle
            ], 200);
        }
    }

    public function archiveData(Request $request){
        $data = $request->validate([
            'file' => 'required|max:10240'
        ]);

        if ($request->file('file')) {
            $uniqueFileName = time() . '_' . date("y-m-d") . '.' . $request->file('file')->getClientOriginalExtension();

            $request->file('file')->store(
                'archives/'.$uniqueFileName
            );

        return response([
            'success' => 'The file has been archived!'
        ], 201);
        }
        return response([
            'error' => 'Something net wrong. Please try again later!'
        ], 500);
    }

    public function getAllFiles(): array
    {
        return Storage::disk('local')->allFiles('archives');
    }
}
