<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::resource('setting', SettingController::class);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
