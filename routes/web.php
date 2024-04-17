<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accept-invitation/{projectId}/{userId}', [ProjectController::class, 'acceptInvitation'])->name('accept-invitation');
Route::post('/send-invitation', [ProjectController::class, 'sendInvitation'])->name('send.invitation');
Route::post('/projects/{projectId}/join-request', [ProjectController::class, 'handleJoinRequest'])->name('projects.join-request');
Route::get('/accept-request/{projectId}/{userId}', [ProjectController::class, 'acceptJoinRequest']);


Route::group(['middleware' => ['auth']], function() {
//Ruta index
Route::get('/index', function () {
    return view('index');
})->name('index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/token', function (Request $request) { 
    if (auth()->check()) {
        auth()->user()->tokens()->delete(); // Opcional: elimina tokens existentes
        
        $userType = auth()->user()->user_type; // Obtiene el tipo desde el método accessor
        
        // Crear token con capacidad adicional para llevar el tipo de usuario
        $token = auth()->user()->createToken('prova', ['role' => $userType]);
        
        return response()->json([
            'token' => $token->plainTextToken,
            'user_type' => $userType
        ], 200);
    } else {
        return response()->json("Not authorized", 405);
    }
});

