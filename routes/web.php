<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/films');
});

Route::get('/films', [App\Http\Controllers\FilmController::class, 'index']);
Route::get('/films/{id}', [App\Http\Controllers\FilmController::class, 'show']);

// maybe change characters to people to match the api urls and leave 'characters' only when neccesary like when getting characters from films
Route::get('/characters', [App\Http\Controllers\PeopleController::class, 'index']);
Route::get('/characters/{id}', [App\Http\Controllers\PeopleController::class, 'show']);

Route::get('/species', [App\Http\Controllers\SpeciesController::class, 'index']);
Route::get('/species/{id}', [App\Http\Controllers\SpeciesController::class, 'show']);

Route::get('/planets', [App\Http\Controllers\PlanetController::class, 'index']);
Route::get('/planets/{id}', [App\Http\Controllers\PlanetController::class, 'show']);

Route::get('/starships', [App\Http\Controllers\StarshipController::class, 'index']);
Route::get('/starships/{id}', [App\Http\Controllers\StarshipController::class, 'show']);

Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index']);
Route::get('/vehicles/{id}', [App\Http\Controllers\VehicleController::class, 'show']);
