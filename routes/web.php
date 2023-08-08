<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertydetailsController;

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

Route::get('/', ([App\Http\Controllers\PropertydetailsController::class, 'index']));

Route::get('/propertiesview/{id}',[PropertydetailsController::class,'property'])->name('property');

