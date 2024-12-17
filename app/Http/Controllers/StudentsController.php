<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function index(){
        $students = student::all();
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        if ($profile=="profesor"){
            return view("$profile.dashboard",compact('students'));
        }
        return view("$profile.students.view",compact('students'));
        
    }
    public function create(){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        return view("$profile.students.create",compact('profile'));
    }
    public function store(Request $request)
{
    $routeName = Route::currentRouteName();
    $profile = explode(".", $routeName)[0];

    
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'edad' => 'required|integer',
        'grado' => 'required',
        'fecha_nacimiento' => 'required|date',
        'direccion' => 'required',
        'telefono_representante' => 'required|string|regex:/^[0-9]{10}$/',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->edad >= 9) {
        $request->validate(['cedula' => 'required|string']);
    }

    $student = new Student();

    $student->nombre = $request->input('nombre');
    $student->apellido = $request->input('apellido');
    $student->edad = $request->input('edad');
    $student->grado = $request->input('grado');
    $student->fecha_nacimiento = $request->input('fecha_nacimiento');
    $student->direccion = $request->input('direccion');
    $student->telefono_representante = $request->input('telefono_representante');

    if ($request->edad >= 9) {
        $student->cedula = $request->input('cedula');
    }

    
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $student->foto = $filename;

    }

    $student->save();

    return redirect()->route("$profile.student.view");
}

    public function show($student){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);
        return view("$profile.students.show",compact('student'));
    }
    public function edit($student){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);
        return view("$profile.students.edit",compact('student'));
    }
    public function update(Request $request,$student){
        $request->validate(['nombre'=>'required',
                                   'apellido'=>'required',
                                   'edad'=>'required',
                                   'grado'=>'required',
                                    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',]);
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);+
        $student->update($request->all());
        
         
    $student->update($request->except('foto'));

    
    if ($request->hasFile('foto')) {
        
        if ($student->foto) {
            File::delete(public_path('images/' . $student->foto));
        }

        
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $student->foto = $filename; 
        $student->save();
    }

    return redirect()->route("$profile.student.show", $student);
    }

    public function destroy($student){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);
        $student->delete();
        return redirect()->route("$profile.student.view");

    }
}
