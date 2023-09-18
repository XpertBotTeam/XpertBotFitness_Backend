<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\WorkoutController;
use App\Http\Controllers\API\CoachController;
use App\Http\Controllers\API\ExerciseController;
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

 Route::resource('workouts',WorkoutController::class);
 Route::resource('coaches',CoachController::class);
 Route::resource('exercises',ExerciseController::class);

 Route::post('register',[AuthController::class,'register']);
 Route::post('login',[AuthController::class,'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
