<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::prefix('admin')->group(function () {
    Route::resource('student', StudentsController::class);
});
