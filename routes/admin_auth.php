<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\studentsController;
use App\Models\student;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    //CRUD Estudiantes
    Route::get('/students/create_student',[studentsController::class,'create'])->middleware(['verified'])->name('student.create');
    Route::get('/students', [studentsController::class,'index'])->middleware(['verified'])->name('student.view');
    Route::post('/students',[studentsController::class,'store']);
    Route::get('/students/{student}', [studentsController::class,'show'])->middleware(['verified'])->name('student.show');
    Route::get('/students/{student}/edit', [studentsController::class,'edit'])->middleware(['verified'])->name('student.edit');
    Route::put('/students/{student}', [studentsController::class,'update'])->middleware(['verified'])->name('student.update');
    Route::delete('/students/{student}', [studentsController::class,'destroy'])->middleware(['verified'])->name('student.destroy');
});
