<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


    
//Actividades
Route::get('/api', function (){
    $estudiantes=auth()->user()->students()->distinct()->orderBy('grado', 'asc')->pluck('grado');
    return response()->json($estudiantes);
})->name('api');
Route::get('calendar/{grade}',[ActivityController::class,'calendarRepresentante'])->name('calendar.view');

Route::get('/api/events/{grade}', [ActivityController::class, 'indexRepresentante'])->name('calendar.index');

