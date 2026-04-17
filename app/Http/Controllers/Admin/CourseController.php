<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $data['courses']=course::all();
        return view("admin.courses.index")->with($data);
    }
    public function create(){
        $data['courses']=course::all();
        return view("admin.courses.create")->with($data);
    }
    public function store(Request $request){
        $request->validate([
            'max_degree' => "required|numeric",
            'name' => "required|string"
        ]);
        course::create([
            'name' => $request->name,
            'max_degree' => $request->max_degree
        ]);
        return redirect(url("dashboard/courses"));
    }
}
