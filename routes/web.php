<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WasteTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('waste-types', WasteTypeController::class)->middleware(['auth']);
Route::resource('collections', CollectionController::class)->middleware(['auth']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
