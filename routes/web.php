<?php

use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\web\BillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin-dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/bills', BillController::class);
});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// Route::view('/admin/dashboard', 'admin.dashboard')->name('admin-dashboard');
// Route::get('/admin/users', [UserController::class, 'index'])->name('admin-users-index');


require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';
