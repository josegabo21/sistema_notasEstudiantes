<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function index(){
        $users = User::all();
        $students = student::all();
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        if ($profile=="profesor"){
            return view("$profile.dashboard",compact('students'));
        }
        return view("$profile.students.view",compact('students', 'users'));
        
    }

    //Grado Admin
    public function firstGrade() {
        $students = Student::where('grado', '1er')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '1er Grado']);
    }
    
    public function secondGrade() {
        $students = Student::where('grado', '2do')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '2do Grado']);
    }
    
    public function thirdGrade() {
        $students = Student::where('grado', '3er')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '3er Grado']);
    }
    
    public function fourthGrade() {
        $students = Student::where('grado', '4to')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '4to Grado']);
    }
    
    public function fifthGrade() {
        $students = Student::where('grado', '5to')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '5to Grado']);
    }
    
    public function sixthGrade() {
        $students = Student::where('grado', '6to')->get();
        return view('admin.grades.grade', ['students' => $students, 'grado' => '6to Grado']);
    }

    //Grado Profesor
    public function primerGrade() {
        $students = Student::where('grado', '1er')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '1er Grado']);
    }
    
    public function segundoGrade() {
        $students = Student::where('grado', '2do')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '2do Grado']);
    }
    
    public function tercerGrade() {
        $students = Student::where('grado', '3er')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '3er Grado']);
    }
    
    public function cuartoGrade() {
        $students = Student::where('grado', '4to')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '4to Grado']);
    }
    
    public function quintohGrade() {
        $students = Student::where('grado', '5to')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '5to Grado']);
    }
    
    public function sextohGrade() {
        $students = Student::where('grado', '6to')->get();
        return view('profesor.grades.grade', ['students' => $students, 'grado' => '6to Grado']);
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
    $student->grado = $request->input('grado') === 'Todos los grados' ? '1er, 2do, 3er, 4to, 5to, 6to' : $request->input('grado');
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

    public function grade($grado = null)
{
    $profesor = auth()->user(); // Obtener el profesor autenticado

    // Inicializar un array para almacenar los estudiantes por grado
    $studentsByGrade = [];

    // Obtener estudiantes del grado asignado al profesor
    if ($profesor->grado_asignado === 'Todos los grados') {
        // Obtener estudiantes de cada grado, incluyendo "Deportes" y "Regular"
        $grades = [ '1er', '2do', '3er', '4to', '5to', '6to'];
        foreach ($grades as $grade) {
            $studentsByGrade[$grade] = Student::where('grado', $grade)->get();
        }
    } else {
        // Solo obtener estudiantes del grado asignado
        $studentsByGrade[$profesor->grado_asignado] = Student::where('grado', $profesor->grado_asignado)->get();
    }

    return view('profesor.grades.grade', compact('studentsByGrade'));
}

    public function assignRepresentative(Request $request, $studentId)
    {
        $request->validate([
            'representante_id' => 'required|exists:users,id',
        ]);

        $student = Student::findOrFail($studentId);
        $student->representante_id = $request->representante_id; // Asigna el ID del representante
        $student->save();

        return redirect()->route('admin.student.view')->with('success', 'Estudiante asignado al representante correctamente.');
    }

    public function boletin($grado = null)
    {
        $profesor = auth()->user(); // Obtener el profesor autenticado

    // Inicializar un array para almacenar los estudiantes por grado
        $studentsByGrade = [];
        $studentsByGrade[$profesor->grado_asignado] = Student::where('grado', $profesor->grado_asignado)->get();
        return view('profesor.calificar.tablaBoletin', compact('studentsByGrade'));
    }
    
    public function dashboard()
{
    $students = auth()->user()->students; // Obtén los estudiantes del usuario autenticado
    return view('dashboard', compact('students')); // Pasa la colección a la vista
}
    public function estudiantesAsignado()
{
    $students = auth()->user()->students; // Obtén los estudiantes del usuario autenticado
    return view('estudiantes', compact('students')); // Pasa la colección a la vista
}
}
