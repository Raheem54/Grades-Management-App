<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\web\HomeController;
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

Route::get('/', [HomeController::class,"index"])->middleware('auth');
Route::prefix("/dashboard")->middleware("auth","isadmin")->group(function(){
    Route::get("/courses",[CourseController::class,"index"]);
    Route::get("/users",[UserController::class,"index"]);
    Route::get("/users/create",[UserController::class,"create"]);
    Route::get("/degrees",[DegreeController::class,"index"]);
    Route::get("/degrees/create",[DegreeController::class,"create"]);
    Route::post("/degrees/store",[DegreeController::class,"store"]);
    Route::post("/users/store",[UserController::class,"store"]);
    Route::get("/courses/create",[CourseController::class,"create"]);
    Route::post("/courses/store",[CourseController::class,"store"]);
    Route::get("/users/delete/{id}",[UserController::class,"delete"]);

});
