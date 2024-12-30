<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\boletines;
use App\Models\student;
use Illuminate\Support\Facades\Storage;

class boletinesController extends Controller
{
    public function show($id_student){
        $student=student::find($id_student);
        $boletines=$student->boletines;
        return view("profesor.calificar.boletin",compact('boletines','student'));
    }
    public function create($id_student){
        $student=student::find($id_student);
        return view("profesor.calificar.create",compact('student'));
    }
    public function store(Request $request,$id_student){
        $request->validate(['documento'=>'required',
                                   ]);
        $student=student::find($id_student);
        if($request->hasFile('documento')){
            $boletin=Storage::disk('public')->put('/boletines',$request->file('documento'));
        }
        $student->boletines()->create([
            'momento'=>$request->momento,
            'directorio'=>$boletin,
        ]);
        return redirect()->route('profesor.boletin.show',$student->id);
    }
    public function descarga($id_boletin){
        $boletin=boletines::find($id_boletin);
        $dirc=$boletin->directorio;
        $student=student::find($boletin->student_id);
        return Storage::disk('public')->download( $dirc,$student->nombre." ".$student->apellido." ".$boletin->momento);
         
    }
}