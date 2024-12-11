<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;

class studentsController extends Controller
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
    public function store(Request $request){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $request->validate(['nombre'=>'required',
                                   'apellido'=>'required',
                                    'edad'=>'required',
                                    'grado'=>'required']);
        student::create($request->all());
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
                                   'grado'=>'required']);
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);+
        $student->update($request->all());
        return redirect()->route("$profile.student.show",$student);
    }

    public function destroy($student){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        $student=student::find($student);
        $student->delete();
        return redirect()->route("$profile.student.view");

    }
}
