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
    Route::post('/deleted','ProvinceController@delete')->middleware("ApiCustomAuth");
});

Route::group(['prefix' => 'district'], function () {

    Route::post('listProvince','DistrictController@listProvince')->middleware("ApiCustomAuth");
    Route::post('','DistrictController@save')->middleware("ApiCustomAuth");
    Route::post('/list','DistrictController@view')->middleware("ApiCustomAuth");
    Route::post('/deleted','DistrictController@delete')->middleware("ApiCustomAuth");
});

Route::group(['prefix' => 'category'], function () {
    Route::post('','CategoryController@save')->middleware("ApiCustomAuth");
    Route::post('/list','CategoryController@view')->middleware("ApiCustomAuth");
    Route::post('/deleted','CategoryController@delete')->middleware("ApiCustomAuth");
});

Route::group(['prefix' => 'location'], function () {

    Route::post('/provinces','LocationController@get_provinces')->middleware("ApiCustomAuth");
    Route::post('/districts','LocationController@get_districts')->middleware("ApiCustomAuth");
    Route::post('/category','LocationController@get_category')->middleware("ApiCustomAuth");
    Route::post('/feature','LocationController@get_feature')->middleware("ApiCustomAuth");

    Route::post('','LocationController@save')->middleware("ApiCustomAuth");
    Route::post('/list','LocationController@view')->middleware("ApiCustomAuth");
    Route::post('/deleted','LocationController@delete')->middleware("ApiCustomAuth");
});



Route::get("/notallowed",function(){
    return json_encode(["status"=>"notallowed"]);
});



