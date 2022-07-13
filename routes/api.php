<?php

use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\Restaurant\RestaurantController;
use App\Http\Controllers\API\Restaurant\MenuController;
use App\Http\Controllers\API\Restaurant\KitchenCategorieController;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\FeedbackController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class ,'signUp']);
Route::post('get_pass',[UserController::class ,'getPass']);

Route::group(["prefix" => "restaurant"],function(){

    Route::get('/',[RestaurantController::class ,'index']);
    Route::get('/{id}',[RestaurantController::class ,'single'])->where('id', '[0-9]+');

    Route::group(["prefix" => "menu"],function(){
        Route::get('/{id}',[MenuController::class ,'index']);
        Route::get('/categories/{id}',[MenuController::class ,'categories']);
        Route::get('/single/{id}',[MenuController::class ,'single']);
    });

    Route::group(["prefix" => "kitchen"],function(){

        Route::get('/',[KitchenCategorieController::class ,'index']);
    });

});

Route::group(["middleware" => ["auth:api"]],function(){


    Route::group(["prefix" => "phone","middleware" => ["has_phone"]],function(){
        Route::get('reg',[UserController::class ,'registerPhone']);
        Route::post('check',[UserController::class ,'checkPhone']);
    });
    Route::group(["prefix" => "order"],function(){
        Route::get('/',[OrderController::class ,'index']);
        Route::post('/store',[OrderController::class ,'store']);
    });

    Route::group(["prefix" => "restaurant"],function(){
        Route::get('/favorites',[OrderController::class ,'favorites']);
        Route::patch('/favorites/{id}',[RestaurantController::class ,'storeFavorites']);
    });

    Route::group(["prefix" => "menu"],function(){
        Route::get('/preference',[OrderController::class ,'preference']);
        Route::patch('/preference/{id}',[MenuController::class ,'storePreference']);
    });

    Route::post('feedback',[FeedbackController::class,'store']);

});


