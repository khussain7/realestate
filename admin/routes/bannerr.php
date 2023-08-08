<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

 
Route::prefix('bannerr')->group(function () {
    Route::get('/bannerlist', [BannerController::class, 'list'])->middleware(['auth', 'verified'])->name('banners.list');
    Route::get('/addbanner',  [BannerController::class, 'index'])->middleware(['auth', 'verified'])->name('banners.index');
    Route::post('/addbanner', [BannerController::class, 'add'])->middleware(['auth', 'verified'])->name('banners.index');
    Route::get('/remove/{id}',[BannerController::class,'delete'])->name('delete');
 });

 /*end routues of pages views and updates */

require __DIR__.'/auth.php';