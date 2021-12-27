<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\LogisticCrud;
use App\Http\Livewire\ProductionCrud;
use App\Http\Livewire\QualityControlCrud;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('logistic', LogisticCrud::class)->name('logistic');

    Route::get('production', ProductionCrud::class)->name('production');

    Route::get('quality-control', QualityControlCrud::class)->name('quality-control');

    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

// Route::get('redirect', DashboardController::class);
