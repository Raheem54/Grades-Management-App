<?php

namespace App\services\DegreesOCR;

use App\Contracts\DegreesOCRInterface;
use App\Models\Admin\course;
use Illuminate\Http\Request;

class AiPrompt implements DegreesOCRInterface{

    public function getDegrees(Request $request)
    {
        $degrees = json_decode($request->degrees, true);
        
        $course=course::find($request->course);
        $course->students()->syncWithoutDetaching($degrees);
    }
}