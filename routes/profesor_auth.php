<?php

use App\Http\Controllers\Profesor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Profesor\Auth\RegisteredUserController;
use App\Http\Controllers\Profesor\ProfileController;
use App\Http\Controllers\StudentsController; 
use App\Http\Controllers\boletinesController;
use App\Http\Controllers\PlanificacionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Profesor\DashboardController;
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
    
    Route::get('/dashboard', function () {
        return view('profesor.dashboard');
    })->middleware(['verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
    

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    
    Route::get('/grades/1er', [StudentsController::class, 'primerGrade'])->name('grades.primer');
    Route::get('/grades/2do', [StudentsController::class, 'segundoGrade'])->name('grades.segundo');
    Route::get('/grades/3er', [StudentsController::class, 'tercerGrade'])->name('grades.tercer');
    Route::get('/grades/4to', [StudentsController::class, 'cuartoGrade'])->name('grades.cuarto');
    Route::get('/grades/5to', [StudentsController::class, 'quintohGrade'])->name('grades.quinto');
    Route::get('/grades/6to', [StudentsController::class, 'sextohGrade'])->name('grades.sexto');

    Route::get('/grades/grade', [StudentsController::class, 'grade'])->name('grades.grade');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Alexander
    Route::get('create_student',[studentsController::class,'create'])->name('student.create');
    Route::get('/calificar/tablaBoletin',[studentsController::class,'boletin'])->name('calificar.tablaBoletin');
    Route::get('/boletines/{id_student}', [boletinesController::class,'show'])->middleware(['verified'])->name('boletin.show');
    Route::get('/boletines/{id_student}/create', [boletinesController::class,'create'])->middleware(['verified'])->name('boletin.create');
    Route::post('/boletines/{id_student}',[boletinesController::class,'store']);
    Route::get('/boletines/descarga/{id_boletin}', [boletinesController::class,'descarga'])->middleware(['verified'])->name('boletin.descarga');
    
    Route::get('/download-word/{lapso}', [FileController::class, 'downloadWord'])->name('download.word');

    require __DIR__.'/profesor_calendar.php';
});
