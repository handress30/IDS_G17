<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WasteTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThirdPartyController;


Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('waste-types', WasteTypeController::class)->middleware(['auth']);
Route::resource('collections', CollectionController::class)->middleware(['auth']);
Route::post('/collections/{collection}/confirm', [CollectionController::class, 'confirm'])->name('collections.confirm');

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware(['auth']);
Route::resource('collection_companies', ThirdPartyController::class, [
    'names' => 'collection_companies'
])->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
