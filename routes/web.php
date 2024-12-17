<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\StudentsController;
=======
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
require __DIR__."/WebCRUD.php";
=======
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a
require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
require __DIR__.'/profesor_auth.php';
