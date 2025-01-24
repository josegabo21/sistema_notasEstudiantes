<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activity;

class ActivityController extends Controller
{
    public function calendar()
    {
        return view('profesor.actividades.calendar');
    }
    public function index()
    {
        $events = activity::all();
        $formattedEvents = $events->map(function ($event) {
            return [
                'id'    => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end'   => $event->end,
                'backgroundColor' => $event->backgroundColor,
                'borderColor' => $event->backgroundColor,
                'allDay' => $event->allDay,
            ];
        });
        return response()->json($formattedEvents);
    }
}
