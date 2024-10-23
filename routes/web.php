<?php

use App\Http\Controllers\GodsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/products/{id}', function(string $id) {
    return view('products', [
        'id' => $id
    ]);
});

require __DIR__.'/auth.php';
