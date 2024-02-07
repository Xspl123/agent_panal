<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SingleController;



//login routes
Route::post('/login', [LoginController::class, 'login']);
Route::get('/campaign', [LoginController::class, 'getcampaign']);

// Route::post('/phoneLogin', [LoginController::class, 'phoneLogin']);
// Route::get('/testing', [LoginController::class, 'getVicidialConferencesData']);


Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::get('/agentDetails', [SingleController::class, 'agentDetails']);
    Route::post('/getPauseCodes', [SingleController::class, 'getPauseCodes']);
     Route::post('/pauseStart', [SingleController::class, 'pauseStart']);
     Route::post('/pauseStop', [SingleController::class, 'pauseStop']);

     Route::post('/activeAgent', [SingleController::class, 'activeAgent']);
     Route::post('/pauseAgent', [SingleController::class, 'pauseAgent']);


    Route::post('/logout', [LoginController::class, 'logout']);
    




});
