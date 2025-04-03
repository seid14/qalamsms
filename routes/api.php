<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\CourseApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Student API routes
Route::get('/students', [StudentApiController::class, 'index']);
Route::post('/students', [StudentApiController::class, 'store']);

// Course API routes
Route::get('/courses', [CourseApiController::class, 'index']);
Route::post('/courses', [CourseApiController::class, 'store']); 