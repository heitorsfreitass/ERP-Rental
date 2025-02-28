<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\MaintenanceLogController;
use App\Http\Controllers\StatisticsController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes (handled by Breeze)
Auth::routes();

// Protected Routes (only for admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('maintenance-logs', MaintenanceLogController::class);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/statistics/equipment', [StatisticsController::class, 'equipmentStats']);
Route::get('/statistics/financial', [StatisticsController::class, 'financialStats']);

require __DIR__.'/auth.php';