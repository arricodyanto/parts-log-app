<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('vehicles')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('vehicles.view');
    Route::get('/add', [VehicleController::class, 'add'])->name('vehicles.add');
    Route::post('/store', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/{vehicle:id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/{vehicle:id}/update', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/{vehicle:id}/delete', [VehicleController::class, 'delete'])->name('vehicles.delete');

});

Route::prefix('users')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.view');
    Route::get('/add', [UserController::class, 'add'])->name('users.add');
    Route::get('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user:id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user:id}/update', [UserController::class, 'update'])->name('users.update');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
