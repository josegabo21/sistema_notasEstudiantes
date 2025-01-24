<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


    
//Actividades
Route::get('calendar',[ActivityController::class,'calendar'])->name('calendar.view');
Route::get('/api/events', [ActivityController::class, 'index'])->name('calendar.index');
