<?php

//use App\Http\Controllers\API\WordTypeController;
//use App\Http\Controllers\API\WordTypeController\WordTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('wordtypes',\App\Http\Controllers\API\WordTypeController::class);
Route::resource('words',\App\Http\Controllers\API\WordController::class);
Route::get('/words/search/{name}', [\App\Http\Controllers\API\WordController::class,'search']);
Route::resource('definitions',\App\Http\Controllers\API\DefinitionController::class);


//Route::get('wordtypes',[\App\Http\Controllers\API\WordTypeController::class,'index']);
//Route::post('wordtypes',[\App\Http\Controllers\API\WordTypeController::class,'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
