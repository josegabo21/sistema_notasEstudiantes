<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Admin\AdminUserProfesorController;
use App\Http\Controllers\Admin\AdminUserRepresentanteController;
use App\Http\Controllers\Admin\DashboardController;
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

    Route::get('/grades/first', [StudentsController::class, 'firstGrade'])->name('grades.first');
    Route::get('/grades/second', [StudentsController::class, 'secondGrade'])->name('grades.second');
    Route::get('/grades/third', [StudentsController::class, 'thirdGrade'])->name('grades.third');
    Route::get('/grades/fourth', [StudentsController::class, 'fourthGrade'])->name('grades.fourth');
    Route::get('/grades/fifth', [StudentsController::class, 'fifthGrade'])->name('grades.fifth');
    Route::get('/grades/sixth', [StudentsController::class, 'sixthGrade'])->name('grades.sixth');

    Route::get('/usuarios/profesor', [AdminUserProfesorController::class, 'index'])->name('usuarios.profesor');
    Route::post('/usuarios/asignar-grados', [AdminUserProfesorController::class, 'assignGrades'])->name('usuarios.asignar_grados');
    Route::get('/usuarios/representante', [AdminUserRepresentanteController::class, 'index'])->name('usuarios.representante');

    Route::get('/usuarios/asignar-grados', [AdminUserProfesorController::class, 'showAsignarGrados'])->name('usuarios.asignar_grados');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



