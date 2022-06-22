<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SourceCodeController;
use App\Http\Controllers\API\SupportingDocumentController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VideoController;
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



Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    Route::apiResource('/users', AuthController::class);
    Route::post('/users/{id}', [AuthController::class, 'update']);

    Route::apiResource('/categories', CategoryController::class);

    Route::apiResource('/videos', VideoController::class);

    Route::apiResource('/documents', SupportingDocumentController::class);
    Route::post('/documents/{id}', [SupportingDocumentController::class, 'update']);

    Route::apiResource('/source-codes', SourceCodeController::class);
    Route::post('/source-codes/{id}', [SourceCodeController::class, 'update']);
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
