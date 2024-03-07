<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProjectController;

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

//Rutes CRUD

Route::middleware(['auth:sanctum'])->group(function () {

Route::resource('/projects', App\Http\Controllers\api\ProjectController::class);
Route::get('/projects/user/summary', [ProjectController::class, 'showUserProjects']);
Route::get('projects/user/saved', [ProjectController::class, 'userProjects']);

});