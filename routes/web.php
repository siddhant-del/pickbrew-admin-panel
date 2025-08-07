<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MerchantController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// User dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin dashboard view (if using closure)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

// Admin dashboard controller route
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});

// Merchant routes
Route::get('/merchants', [MerchantController::class, 'index'])->name('merchants.index');

// Authentication routes
require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
