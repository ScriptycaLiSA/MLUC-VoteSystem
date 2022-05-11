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

    public static function getCollege($voterCollege){
        return DB::table('election_models')
            ->where('college_init', $voterCollege)
            ->value('status');
    }

    public static function getCurrentElections($currentElection){
        return DB::table('candidate_models')
            ->join('election_models','candidate_models.election_id','=','election_models.id')
            ->select('candidate_models.*','election_models.id')
            ->where('candidate_models.id', $currentElection)
            ->value('election_models.id');
    }

    public static function getPositionInElections($candidateId){
        return DB::table('candidate_models')
            ->join('position_models','candidate_models.position_id','=','position_models.id')
            ->select('candidate_models.*','position_models.id')
            ->where('candidate_models.id', $candidateId)
            ->value('position_models.id');
    }
}
