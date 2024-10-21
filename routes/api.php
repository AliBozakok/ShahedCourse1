<?php

use App\Http\Controllers\studentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('allStudent', [studentController::class,'index']);
// Route::get('showStudent/{id}', [studentController::class,'show']);
// Route::post('addStudent', [studentController::class,'store']);
// Route::put('editStudent/{id}', [studentController::class,'update']);
// Route::delete('delteStudent/{id}', [studentController::class,'destroy']);

Route::apiResource('student', studentController::class);
