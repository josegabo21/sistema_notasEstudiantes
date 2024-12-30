<?php

use App\Http\Controllers\boletinesController;
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
    Route::get('/boletines/{id_student}', [boletinesController::class,'show'])->middleware(['verified'])->name('boletin.show');
    Route::get('/boletines/{id_student}/create', [boletinesController::class,'create'])->middleware(['verified'])->name('boletin.create');
    Route::post('/boletines/{id_student}',[boletinesController::class,'store']);
    Route::get('/boletines/descarga/{id_boletin}', [boletinesController::class,'descarga'])->middleware(['verified'])->name('boletin.descarga');
});
