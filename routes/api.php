<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function () {



Route::get('/customers',[CustomerController::class,'index']);
Route::get('/customers/{id}',[CustomerController::class,'show']);
Route::post('/customers',[CustomerController::class,'create']);
Route::put('/customers/{id}',[CustomerController::class,'update']);
Route::delete('/customers',[CustomerController::class,'delete']);
Route::post('/customers/export',[CustomerController::class,'export']);

Route::get('/customers/{customerId}/notes',[NotesController::class,'index']);
Route::get('/customers/{customerId}/notes/{id}',[NotesController::class,'show']);
Route::post('/customers/{customerId}/notes',[NotesController::class,'create']);
Route::patch('/customers/{customerId}/notes/{id}',[NotesController::class,'update']);
Route::delete('/customers/{customerId}/notes/{id}',[NotesController::class,'delete']);

//
//Route::get('/customers/{customerId}/projects',[ProjectController::class,'index']);
//Route::get('/customers/{customerId}/projects/{id}',[ProjectController::class,'show']);
Route::post('/customers/{customerId}/projects',[ProjectController::class,'createProject']);
//Route::patch('/customers/{customerId}/projects/{id}',[ProjectController::class,'update']);
//Route::delete('/customers/{customerId}/projects/{id}',[ProjectController::class,'delete']);

});

Route::post('/users',[UserController::class,'create']);
