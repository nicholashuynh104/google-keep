<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/create",[RegisterController::class,'create']);
Route::post("/login",[LoginController::class,'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get("/users",[UserController::class,'users']);
    Route::get("/logout",[LogoutController::class,'logout']);
});
