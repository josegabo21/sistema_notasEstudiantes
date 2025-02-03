<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


    
//Actividades
Route::get('calendar',[ActivityController::class,'calendar'])->name('calendar.view');
Route::post('calendar',[ActivityController::class,'store']);
Route::get('/api/events', [ActivityController::class, 'index'])->name('calendar.index');
Route::put('calendar/edit', [ActivityController::class, 'update'])->name('calendar.update');
Route::post('/api/update-event', [ActivityController::class, 'updatedrop']);
Route::delete('calendar/edit', [ActivityController::class, 'delete'])->name('calendar.delete');
