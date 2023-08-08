<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/', function () {
   // return view('welcome');
   // Route::get('/login');
  // Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
  return redirect('/login/');
});

Route::get('/template1', function () {
   return view('template1');
 });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/propertydetails',[PropertydetailController::class,'index'])->name('index');
    // Route::post('/propertydetails', [PropertydetailController::class, 'add'])->name('propertydetails.add');
    // Route::get('/propertydetailslist',[PropertydetailController::class,'list'])->name('list');

    // // Route::get('news/{id}', 'NewsController@show')->name('news.show');
    // Route::get('/propertyview/{id}',[PropertydetailController::class,'view'])->name('view');
    // Route::get('/propertydelete/{id}',[PropertydetailController::class,'delete'])->name('delete');

    Route::get('/properties',[PropertiesController::class,'index'])->name('index');
    Route::post('/properties',[PropertiesController::class,'add'])->name('add');
    Route::get('/propertieslist',[PropertiesController::class,'list'])->name('list');
    Route::get('/propertiesview/{id}',[PropertiesController::class,'view'])->name('view');
    Route::get('/propertiesdelete/{id}',[PropertiesController::class,'delete'])->name('delete');
    /*start routues of pages views and updates */
    Route::get('/addpages',[PageController::class,'index'])->name('index');
    Route::post('/addpages',[PageController::class,'add'])->name('add');
    Route::get('/pageslist',[PageController::class,'list'])->name('list');
    Route::get('/pageslistview/{id}',[PageController::class,'view'])->name('view');
    Route::get('/pageslistdelete/{id}',[PageController::class,'delete'])->name('delete');

    /*end routues of pages views and updates */
});

 // Route::get('/propertydetails',[PropertydetailController::class,'index']); method="POST" action="{{ route('login') }}"

 

require __DIR__.'/auth.php';
