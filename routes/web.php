<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TeamController;
use App\Models\Match;
use App\Models\Team;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/team/create', [TeamController ::class, 'read'])->middleware('auth', 'can:create,App\Models\Team');
Route::get('/team/{team:slug}/edit', [TeamController ::class, 'edit'])->middleware('auth', 'can:create,App\Models\Team');
Route::get('/match/create', [MatchController ::class, 'read'])->middleware('auth', 'can:create,App\Models\Match');

Route::post('/match/create', [MatchController::class, 'store'])->middleware('auth');
Route::post('/team/create', [TeamController::class, 'store'])->middleware('auth');
Route::patch('/team/{team:slug}', [TeamController::class, 'update'])->middleware('auth');


Route::get('/s', function() {
    return Match::with('teams')->get();
});