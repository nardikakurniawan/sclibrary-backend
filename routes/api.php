<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::put('/user/{id}', [AuthController::class, 'Update']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/get-users', [AuthController::class, 'getUsers']);
    Route::get('/user-info', [AuthController::class, 'userInfo']);
    
    // Route::put('/user/{id}', [AuthController::class, 'update']);
    // Route::apiResource('/users', AuthController::class);
    Route::apiResource('/users', UserController::class);

    Route::apiResource('/categories', CategoryController::class);
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
