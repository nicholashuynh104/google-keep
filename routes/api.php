<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NoteController;

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
    Route::post("/logout",[LogoutController::class,'logout']);

    //Crud Note
    Route::post("/addNotes",[NoteController::class,'store']);
    Route::get("/getNotes",[NoteController::class,'getNotes']);
    Route::patch("/editNotes/{id}",[NoteController::class,'edit']);
    Route::patch("/cloneNotes/{id}",[NoteController::class,'cloneNotes']);
    Route::post("/updateNotes/{id}",[NoteController::class,'updateNotes']);
    Route::delete("/deleteNotes/{id}",[NoteController::class,'deleteNotes']);
    
});
