<?php

use App\Http\Controllers\DefinitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StaticPageController;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * Static links and pages (non-authenticated)
 */
Route::get('/static/home', [StaticPageController::class, 'home'])
    ->name('static.home');
Route::get('/static/privacy', [StaticPageController::class, 'privacy'])
    ->name('static.privacy');
Route::get('/static/contact', [StaticPageController::class, 'contact'])
    ->name('static.contact');
Route::get('/static/terms', [StaticPageController::class, 'terms'])
    ->name('static.terms');
Route::get('/static/colours', [StaticPageController::class, 'colours'])
    ->name('static.colours');
Route::get('/static/icons', [StaticPageController::class, 'icons'])
    ->name('static.icons');

/**
 * Authenticated pages
 */
Route::middleware('auth')->group(function () {

    Route::resource('/ratings', RatingController::class)->except(['index', 'show']);
    Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');

    Route::resource('/wordtypes', WordTypeController::class)->except(['index', 'show']);
    Route::get('/wordtypes/{wordtype}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');

    Route::resource('/words', WordController::class)->except(['index', 'show']);
    Route::get('/words/{word}/delete', [WordController::class, 'delete'])->name('words.delete');
    Route::get('words/indexOwnWords', [WordController::class, 'indexOwnWords'])->name('words.indexOwnWords');


    Route::resource('/definitions', \App\Http\Controllers\DefinitionController::class)->except(['index', 'show']);
    Route::get('/definitions/{definition}/delete', [DefinitionController::class, 'delete'])->name('definitions.delete');
    Route::get('definitions/indexOwnDefinitions', [DefinitionController::class, 'indexOwnDefinitions'])->name('definitions.indexOwnDefinitions');

    Route::resource('/users', UserController::class)->except(['index', 'show']);
    Route::get('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
});


Route::resource('wordtypes', WordTypeController::class)->only(['index', 'show']);
Route::resource('words', WordController::class)->only(['index', 'show']);
Route::resource('definitions', DefinitionController::class)->only(['index', 'show']);
Route::resource('users', UserController::class)->only(['index', 'show']);
Route::resource('ratings', RatingController::class)->only(['index', 'show']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/force-styles', function () {
    return view('force-styles');
});
