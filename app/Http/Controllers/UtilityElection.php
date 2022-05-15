<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UtilityElection extends Controller
{
    public static function hasVoted($voterId)
    {
        return DB::table('voting_results')
            ->where('voter_id', $voterId)
            ->value('isVoted');
    }

    public static function getCollege($voterCollege)
    {
        return DB::table('election_models')
            ->where('college_init', $voterCollege)
            ->value('status');
    }

    public static function getCollegeTally($voterCollege): \Illuminate\Support\Collection
    {
        return DB::table('election_models')
            ->where('college_init', $voterCollege)
            ->get();
    }

    public static function getCurrentElections($currentElection)
    {
        return DB::table('candidate_models')
            ->join('election_models', 'candidate_models.election_id', '=', 'election_models.id')
            ->select('candidate_models.*', 'election_models.id')
            ->where('candidate_models.id', $currentElection)
            ->value('election_models.id');
    }

    public static function getPositionInElections($candidateId)
    {
        return DB::table('candidate_models')
            ->join('position_models', 'candidate_models.position_id', '=', 'position_models.id')
            ->select('candidate_models.*', 'position_models.id')
            ->where('candidate_models.id', $candidateId)
            ->value('position_models.id');
    }

    public static function getActiveElection($electionId)
    {
        return DB::table('election_models')
            ->where('id', $electionId)
            ->value('status');
    }

    private static function getCandidatesInElection($electionId): \Illuminate\Support\Collection
    {
        return DB::table('voting_results')
            ->select(DB::raw('position_id,candidate_id,count(*) as votes'))
            ->groupBy('position_id', 'candidate_id')
            ->where('election_id', $electionId)
            ->orderBy('votes', 'desc')
            ->get();
    }

    public static function getFinalResult($elecId)
    {
        $result = self::getCandidatesInElection($elecId);
        $position = DB::table('position_models')
            ->where('election_id', $elecId)->get();
        $candidate = DB::table('candidate_models')
            ->where('election_id', $elecId)
            ->get();

        return response([
            'result' => $result,
            'position' => $position,
            'candidate' => $candidate,
        ], 200);
    }

    public static function findVoter($voterId)
    {
        return DB::table('voter_acct_models')
            ->where('idNum', $voterId)
            ->first();
    }
}
