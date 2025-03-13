<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
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
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

// Route::post('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');

// Route::post('/series/destroy/{id}', 'destroy')->name('series.destroy');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

Route::post('/seasons/{season}/episodes', function (\Illuminate\Http\Request $request) {
    dd($request->all());
});
