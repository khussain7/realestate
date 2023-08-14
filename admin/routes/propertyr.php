<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyDetailsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


//Route::get('/',[PropertydetailController::class,'index'])->name('index');

Route::prefix('propertyr')->group(function () {
    // Add property details
    Route::get('/addproperty', [PropertyDetailsController::class, 'index'])->middleware(['auth', 'verified'])->name('propertydetails.index');
    Route::post('/addproperty',  [PropertyDetailsController::class, 'addproperty'])->middleware(['auth', 'verified'])->name('propertydetails.index');
    Route::get('/amenities/{id}', [PropertyDetailsController::class, 'addaminites'])->middleware(['auth', 'verified'])->name('propertydetails.aminites');
    Route::post('/amenities', [PropertyDetailsController::class, 'saveaminites'])->middleware(['auth', 'verified'])->name('propertydetails.aminites');
    Route::get('/uploadimages/{id}', [PropertyDetailsController::class, 'uploadimages'])->middleware(['auth', 'verified'])->name('propertydetails.upload');
    Route::post('/uploadimages', [PropertyDetailsController::class, 'saveimages'])->middleware(['auth', 'verified'])->name('propertydetails.upload');
    // Get property list 
    Route::get('/propertylist', [PropertyDetailsController::class, 'list'])->middleware(['auth', 'verified'])->name('propertydetails.list');
 });



require __DIR__.'/auth.php';