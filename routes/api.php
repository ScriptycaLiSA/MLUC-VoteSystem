<?php

use App\Http\Controllers\SystemServerRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoterMgmtController;
use \App\Http\Controllers\VoterAuthController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});

//Admin Login
Route::post('/adminLogin', [AuthController::class, 'adminLogin']); //working
//Administration Control
Route::post('/make_admin', [AuthController::class, 'register']); //working
Route::post('/update_records', [SystemServerRecordController::class, 'saveRecordsFromOrigin']); //working
Route::get('/mstr_dash', [SystemServerRecordController::class, 'mstrUpdtDash']); //working
Route::post('/logout', [AuthController::class, 'logout']); //working

//fetching data from database to requesting destination
Route::get('/voterinfo/{idNum}', [VoterMgmtController::class, 'getVoterInfo']);
Route::get('/voterget_all', [VoterMgmtController::class, 'getVoterInfoAll']);
//voter controls
Route::post('/voterLogin', [VoterAuthController::class, 'voterLogin']);
