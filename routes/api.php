<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoterMgmtController;

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
    //Sending data request to Laravel API
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

//Administration Control
Route::post('/adminLogin', [AuthController::class, 'adminLogin']); //working
Route::post('/make_admin', [AuthController::class, 'register']); //working
Route::post('/voterCreateAcct',[VoterMgmtController::class, 'registerVoterFromStud']);

//fetching data from database to requesting destination
Route::get('/voterinfo/{idNum}', [VoterMgmtController::class, 'getVoterInfo']);
Route::get('/voterget_all', [VoterMgmtController::class, 'getVoterInfoAll']);

