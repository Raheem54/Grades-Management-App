<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\DegreesOCRInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PDFFileRequest;
use App\Http\Requests\promptRequest;
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
    public function storeGemini(PDFFileRequest $request,DegreesOCRInterface $Degrees){
        $Degrees->getDegrees($request);
        return redirect("dashboard/degrees");
    }
    public function storePrompt(promptRequest $request,DegreesOCRInterface $Degrees){
        $Degrees->getDegrees($request);
        return redirect("dashboard/degrees");
    }
    public function delete(Request $request){
        $course=course::find($request->id);
        $course->students()->detach();
        return redirect()->back();
    }
}
