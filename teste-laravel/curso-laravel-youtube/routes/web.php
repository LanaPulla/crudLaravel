<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::delete('/nome/{id}',[AppController::class, 'destroy'])->name('app.delete');
Route::get('/nome',[AppController::class, 'index'])->name('app.index');
Route::post('/nome-id',[AppController::class, 'store'])->name('app.store');
Route::get('/nome/{id}',[AppController::class, 'show'])->name('app.edit');
Route::put('{id}',[AppController::class, 'update'])->name('app.update');


