<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\course;
use App\Models\User;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index(){
        $data['courses']=course::all();
        return view("admin.grades.index")->with($data);
    }
    public function create(){
        $data['courses']=course::all();
        $data['users']=User::all('id','name');
        return view("admin.grades.create")->with($data);
    }
    public function store(Request $request){
        $request->validate([
            "course" => "required|integer",
            "degrees" => "required|json"
        ]);
        $degrees = json_decode($request->degrees, true);
        
        $course=course::find($request->course);
        $course->students()->syncWithoutDetaching($degrees);
        return redirect(url("dashboard/degrees"));
    }
}
