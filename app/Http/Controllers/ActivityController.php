<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activity;
use Illuminate\Routing\Route;

class ActivityController extends Controller
{
    public function calendar()
    {
        
        return view('profesor.actividades.calendar');
    }
    public function index()
    {   
        $events = activity::where("grado",auth()->user()->grado_asignado,)->get();
        // $formattedEvents = $events->map(function ($event) {
        //     return [
        //         'id'    => $event->id,
        //         'title' => $event->title,
        //         'start' => $event->start,
        //         'end'   => $event->end,
        //         'backgroundColor' => $event->backgroundColor,
        //         'borderColor' => $event->backgroundColor,
        //         'allDay' => $event->allDay,
        //     ];
        // });
        return response()->json($events);
    }
    public function store(Request $request )
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'start' => 'required|date',
            'end'=>'nullable',
            'allDay'=>'nullable',
            'backgroundColor' => 'required',            
        ]);
        if ($request->allDay){
            $allDay=True;
        }else{
            $allDay=False;
        }

        activity::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "type"=>$request->type,
            "start"=>$request->start,
            "end"=>$request->end,
            "grado"=>auth()->user()->grado_asignado,
            "backgroundColor"=>$request->backgroundColor,
            "allDay"=>$allDay,
            ]);
        return redirect()->route("profesor.calendar.view");
    }
    public function update(Request $request){
        $request->validate([
            'id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'start' => 'required|date',
            'end'=>'nullable',
            'allDay'=>'nullable',
            'backgroundColor' => 'required',            
        ]);
        if ($request->allDay){
            $allDay=True;
        }else{
            $allDay=False;
        }
        $actividad=activity::find($request->id);
        $actividad->title=$request->title;
        $actividad->description=$request->description;
        $actividad->type=$request->type;
        $actividad->start=$request->start;
        $actividad->end=$request->end;
        $actividad->grado=auth()->user()->grado_asignado;
        $actividad->backgroundColor=$request->backgroundColor;
        $actividad->allDay=$allDay;
        $actividad->save();
        return redirect()->route("profesor.calendar.view");
    }
    public function updatedrop(Request $request){
        $event = activity::find($request->id);
    
        if (!$event) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }
    
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();
    
        return response()->json(['success' => 'Evento actualizado']);
    }
    public function delete(Request $request){
        $actividad=activity::find($request->id);
        $actividad->delete();
        return redirect()->route("profesor.calendar.view");
    }


    public function calendarRepresentante($grado)
    {
        
        return view('auth.actividades.calendar',compact('grado'));
    }
    public function indexRepresentante($grado)
    {   $grado=str($grado);
        // $grades=auth()->user()->students()->distinct()->orderBy('grado', 'asc')->pluck('grado');
        $events = activity::where("grado",$grado)->get();
       
        return response()->json($events);
    }
}
