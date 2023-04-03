<?php

use App\Http\Controllers\Controller;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/users', [Controller::class, 'getUsers']);
Route::get('/users/{id}', [Controller::class, 'getUserBy']);
Route::get('/activities', [Controller::class, 'getActivities']);
Route::get('/activities/{id}', [Controller::class, 'getActivityBy']);
Route::get('/users/{id_user}/activities/{id_activity}', [Controller::class, 'getPerformance']);
