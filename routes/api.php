<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\Restaurant\RestaurantController;
use App\Http\Controllers\API\Restaurant\MenuController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class ,'signUp']);
Route::post('get_pass',[UserController::class ,'getPass']);

Route::group(["prefix" => "restaurant"],function(){

    Route::get('/',[RestaurantController::class ,'index']);
    Route::get('/{id}',[RestaurantController::class ,'single']);

    Route::group(["prefix" => "menu"],function(){

        Route::get('/{id}',[MenuController::class ,'index']);
        Route::get('/categories/{id}',[MenuController::class ,'categories']);
        Route::get('/single/{id}',[MenuController::class ,'single']);
    });

});

Route::group(["middleware" => ["auth:api"]],function(){

    Route::get('test',[UserController::class ,'test']);

});


