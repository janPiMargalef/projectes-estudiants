<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\MentorController;

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

Route::resource('/mentors', App\Http\Controllers\api\MentorController::class);
Route::resource('/projects', App\Http\Controllers\api\ProjectController::class);
Route::post('/users/toggle-save-mentor/{mentor}', [MentorController::class, 'saveOrUnsaveMentor']);
Route::get('/projects/user/summary', [ProjectController::class, 'showUserProjects']);
Route::get('/projects/user/saved', [ProjectController::class, 'userProjects']);
Route::get('/projects/user/info', [ProjectController::class, 'userInfo']);
Route::post('/projects/user/image', [ProjectController::class, 'updateProfileImage']);
Route::post('/projects/{project}/interact', [ProjectController::class, 'interact']);
Route::delete('/projects/{project}/interaction', [ProjectController::class, 'removeInteraction']);
Route::get('/projects/user/created', [ProjectController::class, 'createdProjects']);




});