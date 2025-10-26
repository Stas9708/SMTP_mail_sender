<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuccessController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/send', [HomeController::class, 'store'])->name('store');
Route::get('/{uuid}/success', [SuccessController::class, 'index'])->name('success');
