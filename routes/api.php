<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    //Auth
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/me', [\App\Http\Controllers\AuthController::class, 'me']);

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

    Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'show']);
    Route::post('/projects', [\App\Http\Controllers\ProjectController::class, 'store']);
    Route::put('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy']);


    // ====== Duitku ====== //
    //get payment method
    Route::post('/getpaymentmethod', [\App\Http\Controllers\PaymentController::class, 'get_payment_method']);

});
