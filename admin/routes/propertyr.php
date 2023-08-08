<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


//Route::get('/',[PropertydetailController::class,'index'])->name('index');

Route::prefix('propertyr')->group(function () {
    Route::get('/addproperty', [PropertyDetailsController::class, 'list'])->middleware(['auth', 'verified'])->name('banners.list');
    Route::get('/addaminity/{id}',  [PropertyDetailsController::class, 'index'])->middleware(['auth', 'verified'])->name('banners.index');
    Route::post('/addimages/{id}', [PropertyDetailsController::class, 'add'])->middleware(['auth', 'verified'])->name('banners.index');
 });



require __DIR__.'/auth.php';