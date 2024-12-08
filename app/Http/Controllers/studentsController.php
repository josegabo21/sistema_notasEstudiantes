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
        return view("$profile.dashboard",compact('students'));
    }
    public function create(){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        return view("$profile.students.create",compact('profile'));
    }
    public function store(Request $request){
        $routeName = Route::currentRouteName();
        $profile=explode(".",$routeName)[0];
        student::create(($request->all()));
        return redirect()->route("$profile.dashboard");
    }
}
