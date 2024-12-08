<?php

use App\Http\Controllers\Profesor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Profesor\Auth\RegisteredUserController;
use App\Http\Controllers\Profesor\ProfileController;
use App\Http\Controllers\studentsController;
use App\Models\student;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:profesor')->prefix('profesor')->name('profesor.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth:profesor')->prefix('profesor')->name('profesor.')->group(function () {
    
    Route::get('/dashboard', [studentsController::class,'index'])->middleware(['verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    //Alexander
    Route::get('create_student',[studentsController::class,'create'])->name('student.create');
    Route::post('/dashboard',[studentsController::class,'store']);
});
