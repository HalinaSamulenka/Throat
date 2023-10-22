<?php

use App\Http\Controllers\DefinitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\WordTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/ratings/add', [RatingController::class, 'create'])->name('ratings.add');
Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::get('/wordtypes/create', [WordTypeController::class, 'create'])->name('wordtypes.create');
Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
Route::get('/definitions/create', [DefinitionController::class, 'create'])->name('definitions.create');

Route::resource('ratings', RatingController::class)->only(['index', 'show']);
Route::resource('wordtypes', WordTypeController::class)->only(['index', 'show']);
Route::resource('words', WordController::class)->only(['index', 'show']);
Route::resource('definitions', DefinitionController::class)->only(['index', 'show']);
Route::resource('users', UserController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('/ratings', RatingController::class)->except(['index', 'show']);
    Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');

    Route::resource('/wordtypes', WordTypeController::class)->except(['index', 'show']);
    Route::get('/wordtypes/{wordtype}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');

    Route::resource('/words', WordController::class)->except(['index', 'show']);
    Route::get('/words/{word}/delete', [WordController::class, 'delete'])->name('words.delete');

    Route::resource('/definitions', \App\Http\Controllers\DefinitionController::class)->except(['index', 'show']);
    Route::get('/definitions/{definition}/delete', [DefinitionController::class, 'delete'])->name('definitions.delete');

    Route::resource('/users', UserController::class)->except(['index', 'show']);
    Route::get('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
});

/**
 * Routes for Word Types
 */
//Route::get('/wordtypes',[WordTypeController::class, 'index'])->name('wordtypes.index');

//Route::get('/wordtypes/{wordType}',[WordTypeController::class, 'show'])->name('wordtypes.show');
//Route::post('/wordtypes', [WordTypeController::class, 'store'])->name('wordtypes.store');
//Route::get('wordtypes.create', [WordTypeController::class, 'create'])->name('wordtypes.create');
//Route::get('/wordtypes/{wordType}/edit', [WordTypeController::class, 'edit'])->name('wordtypes.edit');
//Route::get('/wordtypes/{wordType}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');
//Route::patch('/wordtypes/{wordType}', [WordTypeController::class, 'update'])->name('wordtypes.update');
//Route::middleware('auth')->group(function () {
    //Route::resource('/wordtypes', WordTypeController::class)->except(['index', 'show']);
    //Route::get('/wordtypes/{wordType}/edit', [WordTypeController::class, 'edit'])->name('wordtypes.edit');
    //Route::get('/wordtypes/{wordType}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');
    //Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');
//});
//Route::resource('wordtypes', WordTypeController::class)->only(['index', 'show']);
//Route::middleware('auth')->group(function () {
//    Route::resource('/wordtypes', WordTypeController::class)->except(['index', 'show']);
//    Route::get('/wordtypes/{wordType}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');
//});

Route::get('/words',
    [WordController::class, 'index']
)->name('words.index');


require __DIR__.'/auth.php';
Route::get('/force-styles', function () {
    return view('force-styles');
});
