<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GodsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('gods', GodsController::class);
Route::get('/gods/{god}/delete', [GodsController::class, 'delete'])->name('gods.delete');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin_dash', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin_dash/toggle/{god}', [AdminController::class, 'toggle'])->name('admin.toggle');
    // Other admin routes
});
require __DIR__.'/auth.php';
