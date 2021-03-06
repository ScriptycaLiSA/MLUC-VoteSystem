<?php

use App\Http\Controllers\Admin\v1\CampaignSiteController;
use App\Http\Controllers\Admin\v1\Candidates\CandidateControllers;
use App\Http\Controllers\Admin\v1\CollegeController;
use App\Http\Controllers\Admin\v1\Election\ElectionController;
use App\Http\Controllers\Admin\v1\Election\ElectionResultController;
use App\Http\Controllers\Admin\v1\Partylist\PartylistController;
use App\Http\Controllers\Admin\v1\Position\PositionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\SystemServerRecordController;
use App\Http\Controllers\UtilityElection;
use App\Http\Controllers\Voter\v1\VotingController;
use App\Http\Controllers\Voter\v1\VotingLeaderboardController;
use App\Http\Controllers\VoterAuthController;
use App\Http\Controllers\VoterMgmtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//Admin Login
Route::post('/adminLogin', [AuthController::class, 'adminLogin']); //working



Route::middleware(['auth:sanctum', 'abilities:access-admin'])->group(function () {
    /*  Administration Control
    *  This part contains get methods for elections
    */
    Route::post('/make_admin', [AuthController::class, 'register']); //working
    //Candidate functions
    Route::get('/get_candidates', [CandidateControllers::class, 'getRecords']);
    Route::post('/create_candidate', [CandidateControllers::class, 'createCandidate']);
    Route::post('/delete_candidate', [CandidateControllers::class, 'deleteCandidate']);

    //Positions
    Route::post('/create_position', '\App\Http\Controllers\Admin\v1\Position\CreatePositionController');
    Route::post('/delete_position', [PositionController::class, 'deletePosition']);

    //Election
    Route::post('/elecstatus_change', [ElectionController::class, 'electionStatusUpdate']);
    Route::post('/election_results', [ElectionResultController::class, 'searchElectionResults']);
    Route::post('/create_election', [ElectionController::class, 'createElection']);
    Route::post('/delete_election', [ElectionController::class, 'deleteElection']);

    //Colleges
    Route::get('/colleges', [CollegeController::class, 'index']);
    Route::post('/create_college', [CollegeController::class, 'createCollege']);
    Route::post('/delete_college', [CollegeController::class, 'deleteCollegeRecord']);
    Route::get('/colleges_sorted', [CollegeController::class, 'sortedDataForColleges']);

    //Partylist
    Route::get('/partylist_data', [PartylistController::class, 'index']);
    Route::post('/create_partylist', [PartylistController::class, 'createPartylist']);
    Route::post('/delete_partylist', [PartylistController::class, 'deletePartylist']);

    //voter function
    Route::get('/voterinfo/{idNum}', [VoterMgmtController::class, 'getVoterInfo']);
    Route::post('/update_voter', [VoterMgmtController::class, 'updateVoterData']);
    Route::post('/delete_voter', [VoterMgmtController::class, 'deleteVoterData']);

    /*
     *  An area consists of display functions and updating records
     */
    Route::post('/update_records', [SystemServerRecordController::class, 'saveRecordsFromOrigin']); //working
    Route::post('/archive_data', [SystemServerRecordController::class, 'archiveData']); //working
    Route::get('/archive_lists', [SystemServerRecordController::class, 'getAllFiles']);
    Route::get('/mstr_dash', [SystemServerRecordController::class, 'mstrUpdtDash']); //working

    Route::post('/logout', [AuthController::class, 'logout']); //working
});

// voter endpoints
Route::middleware(['auth:sanctum', 'abilities:access-voter'])->group(function () {
    //election render if voter is already voted or not/ finding elections in his college
    Route::post('/view_election', [VotingController::class, 'viewElection']);

    Route::get('/voter/user', [VoterAuthController::class, 'getVoterSession']);
    Route::post('/voterLogout', [VoterAuthController::class, 'voterLogout']);

    //vote casting
    Route::post('/cast_vote', [VotingController::class, 'castVote']);

    //voter leaderboard
    Route::post('/voting_leaderboard', [VotingLeaderboardController::class, 'voterLeaderboard']);
});


//fetching data from database to requesting destination
Route::get('/voterget_all', [VoterMgmtController::class, 'getVoterInfoAll']);
Route::get('/election_data', [ElectionController::class, 'search']);

//Campaign Site
Route::get('/image_search/{filename}', [ImgController::class, 'search']);
Route::get('/campaignSite', [CampaignSiteController::class, 'fetchCandidateData']);


//Voter Login
Route::post('/voterLogin', [VoterAuthController::class, 'voterLogin']);

Route::post('/voter_create', [VoterAuthController::class, 'voterCreateAcct']);
Route::get('/colleges_data', [CollegeController::class, 'index']);
Route::get('/get_positions', [PositionController::class, 'index']);

Route::post('/get_idsample', [VotingLeaderboardController::class, 'getVotingResultSchema']);
