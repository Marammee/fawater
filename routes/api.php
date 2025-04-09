<?php

use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
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

Route::prefix('auth')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
});


Route::middleware('auth:sanctum')->group(function () {

    // category
    Route::get('/categories', [CategoryController::class, 'index']); // Get all categories

    // bills resource
    Route::resource('/bills', BillController::class);


    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']); // Get all users
        Route::post('/', [UserController::class, 'store']); // Create a new user
        Route::get('{id}', [UserController::class, 'show']); // Get a specific user
        Route::put('{id}', [UserController::class, 'update']); // Update user information
        Route::delete('{id}', [UserController::class, 'destroy']); // Delete a user
        Route::post('/logout', [UserController::class, 'logout']); // Logout user
    });
});


// Route::middleware('auth:sanctum')->get('/useree', function (Request $request) {
//     return $request->user();
// });
