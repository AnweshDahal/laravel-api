<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

// Route::resource('products', ProductController::class);

// Public Routes
ROUTE::post('/register', [AuthController::class, 'register']);
ROUTE::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);


Route::group(['middleware'=>['auth:sanctum']], function() {
    ROUTE::post('/logout', [AuthController::class, 'logout']);
    ROUTE::post('/products', [ProductController::class, 'store']);
    ROUTE::put('/products/{id}', [ProductController::class, 'update']);
    ROUTE::delete('/products/{id}', [ProductController::class, 'destroy']);
});

// // GET routes

// Route::get('/products/{id}')

// // POST routes

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
