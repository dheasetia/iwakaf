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
//Route::post('/login', function (){
//    return 'joz';
//});

Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index']);
Route::get('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'show']);

Route::get('/articlecategories', [\App\Http\Controllers\ArticleCategoryController::class, 'index']);
Route::get('/articlecategories/{id}', [\App\Http\Controllers\ArticleCategoryController::class, 'show']);

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show']);

// === CALLBACK ===
Route::post('/isalamwakafpaymentcallback', [\App\Http\Controllers\PaymentController::class, 'callback']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    //Auth
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/me', [\App\Http\Controllers\AuthController::class, 'me']);

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);


    Route::post('/projects', [\App\Http\Controllers\ProjectController::class, 'store']);
    Route::put('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy']);

    //==== ArticleCategory ====

    Route::post('/articlecategories', [\App\Http\Controllers\ArticleCategoryController::class, 'store']);
    Route::put('/articlecategories/{id}', [\App\Http\Controllers\ArticleCategoryController::class, 'update']);
    Route::delete('/articlecategories/{id}', [\App\Http\Controllers\ArticleCategoryController::class, 'destroy']);


    //==== ArticleComment ====
    Route::get('/articlecomments', [\App\Http\Controllers\ArticleCommentController::class, 'index']);
    Route::get('/articlecomments/{id}', [\App\Http\Controllers\ArticleCommentController::class, 'show']);
    Route::post('/articlecomments', [\App\Http\Controllers\ArticleCommentController::class, 'store']);
    Route::put('/articlecomments/{id}', [\App\Http\Controllers\ArticleCommentController::class, 'update']);
    Route::delete('/articlecomments/{id}', [\App\Http\Controllers\ArticleCommentController::class, 'destroy']);

    //==== Articles ====

    Route::post('/articles', [\App\Http\Controllers\ArticleController::class, 'store']);
    Route::put('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [\App\Http\Controllers\ArticleController::class, 'destroy']);

    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);

    // ==== Bio ====
    Route::get('/bios', [\App\Http\Controllers\BioController::class, 'index']);
    Route::get('/bios/{id}', [\App\Http\Controllers\BioController::class, 'show']);
    Route::put('/bios/{id}', [\App\Http\Controllers\BioController::class, 'update']);

    // ====== Duitku ====== //
    //get payment method
    Route::get('/transactioninquiries', [\App\Http\Controllers\TransactionInquiryController::class, 'index']);
    Route::post('/checktransactionstatus', [\App\Http\Controllers\TransactionInquiryController::class, 'check_transaction_status']);
    Route::post('/getpaymentmethod', [\App\Http\Controllers\PaymentController::class, 'get_payment_method']);
    Route::post('/transactioninquiries/create', [\App\Http\Controllers\TransactionInquiryController::class, 'create_inquiry']);

});
