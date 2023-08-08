<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

Route::prefix('agentr')->group(function () {
    Route::get('/agentlist', [AgentController::class, 'list'])->middleware(['auth', 'verified'])->name('agent.list');
    Route::get('/addagent',  [AgentController::class, 'index'])->middleware(['auth', 'verified'])->name('agent.index');
    Route::post('/addagent', [AgentController::class, 'add'])->middleware(['auth', 'verified'])->name('agent.add');
    Route::get('/remove/{id}',[AgentController::class,'delete'])->name('delete');
    Route::get('/agentdetails/{id}',[AgentController::class,'delete'])->name('delete');
 });

 /*end routues of pages views and updates */

require __DIR__.'/auth.php';