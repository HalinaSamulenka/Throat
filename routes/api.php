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


//Public routes
Route::post('/register',[\App\Http\Controllers\API\AuthController::class,'register']);
Route::post('/login',[\App\Http\Controllers\API\AuthController::class,'login']);


//Protected routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[\App\Http\Controllers\API\AuthController::class,'logout']);
    Route::resource('wordtypes',\App\Http\Controllers\API\WordTypeController::class);

    Route::post('words/',[\App\Http\Controllers\API\WordController::class,'store']);
    Route::put('words/{id}',[\App\Http\Controllers\API\WordController::class,'update']);
    Route::delete('/words/{id}', [\App\Http\Controllers\API\WordController::class, 'destroy']);

    //Route::get('/words/search/{name}', [\App\Http\Controllers\API\WordController::class,'search']);
    Route::get('definitions/indexOwnDefinitions',[\App\Http\Controllers\API\DefinitionController::class,'indexOwnDefinitions']);
    Route::post('definitions/',[\App\Http\Controllers\API\DefinitionController::class,'store']);
    Route::put('definitions/{id}',[\App\Http\Controllers\API\DefinitionController::class,'update']);
    Route::delete('/definitions/{id}', [\App\Http\Controllers\API\DefinitionController::class, 'destroy']);



});


//Public routes
Route::get('words',[ \App\Http\Controllers\API\WordController::class,'index']);
Route::get('/words/search/{name}', [\App\Http\Controllers\API\WordController::class,'search']);
Route::get('words/{id}',[ \App\Http\Controllers\API\WordController::class,'show']);
Route::get('definitions/{id}',[\App\Http\Controllers\API\DefinitionController::class,'show']);
Route::get('definitions/',[\App\Http\Controllers\API\DefinitionController::class,'index']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
