<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization');
header('Access-Control-Allow-Method: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');


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


Route::post('login','UserController@login');



Route::group(['prefix' => 'feature'], function () {
    Route::post('','FeatureController@save')->middleware("ApiCustomAuth");
    Route::post('/list','FeatureController@view')->middleware("ApiCustomAuth");
    Route::post('/deleted','FeatureController@delete')->middleware("ApiCustomAuth");
});


Route::group(['prefix' => 'province'], function () {
    Route::post('','ProvinceController@save')->middleware("ApiCustomAuth");
    Route::post('/list','ProvinceController@view')->middleware("ApiCustomAuth");
});


Route::get("/notallowed",function(){
    return json_encode(["status"=>"notallowed"]);
});



