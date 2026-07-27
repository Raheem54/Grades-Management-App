<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecourseRequest;
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
    public function store(StorecourseRequest $request){
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
    public function delete(Request $request){
        $course=course::find($request->id);
        if($course) {
            $course->delete();
        }
        return redirect()->back();
    }
}
