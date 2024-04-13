<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//ok - funcionou
//Route::get('hello', function (){
//   return 'Hello world';
//});

//ok - funcionou no postman
//Route::post('hello-post', function (){
//    return 'Hello post';
//});

//ok - funcionou no postman (controller)
//Route::post('hello-post', 'App\Http\Controllers\HelloWorldController@hello');

//ok -funcionou no postman (controller variável) and (controller json + json array)
//Route::post('hello-post/{name}', 'App\Http\Controllers\HelloWorldController@hello');

//ok -funcionou no postman (controller json array all)
//Route::get('hello-get/{name}', 'App\Http\Controllers\HelloWorldController@hello');

//ok - funcionou
//Route::get('hello/{name}', function ($name){
//    return 'Hello ' . $name;
//});


//Spotify
//funcionou no postman
Route::get('bands', 'App\Http\Controllers\BandController@getAll');
Route::get('bands/{id}', 'App\Http\Controllers\BandController@getById');
Route::get('bands/gender/{id}', 'App\Http\Controllers\BandController@getGenderById');
Route::post('bands/store', 'App\Http\Controllers\BandController@store');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
