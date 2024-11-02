<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\studentCourseController;
use App\Http\Controllers\userController;
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


Route::post('UserLogin', [userController::class,'login']);
Route::post('AdminLogin', [adminController::class,'login']);
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {


    Route::get('UserLogout', [userController::class,'logout']);
    Route::get('UserProfile', [userController::class,'me']);
    Route::apiResource('student', studentController::class);
    Route::apiResource('course', courseController::class);
    Route::apiResource('studentCousre', studentCourseController::class);
    Route::get('studentGrd/{id}', [studentController::class,'Grd']);
});

Route::group([

    'middleware' => 'admin',
    'prefix' => 'auth'

], function ($router) {

    Route::apiResource('userControl', adminController::class);
    Route::get('AdminLogout', [adminController::class,'logout']);
    Route::get('AdminProfile', [adminController::class,'me']);

});
