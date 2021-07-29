<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::middleware('auth:api')->prefix('v1')->group(function(){
        Route::get('/user',function(Request $request)
        {
            return $request->user();
        });

    }); 

    Route::prefix('/user')->group(function(){

    Route::post('/login','App\Http\Controllers\api\v1\LoginController@loginApi');
    });

    Route::get('list',[UserController::class,'list']);
    

    
    
