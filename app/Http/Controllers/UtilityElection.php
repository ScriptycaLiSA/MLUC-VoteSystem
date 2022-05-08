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
}
