<?php

namespace App\services\DegreesOCR;

use App\Contracts\DegreesOCRInterface;
use App\Models\Admin\course;
use App\Models\User;
use Gemini\Data\GenerationConfig;
use Gemini\Data\UploadedFile;
use Gemini\Enums\MimeType;
use Gemini\Enums\ResponseMimeType;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;

class GeminiService implements DegreesOCRInterface{
    function getDegrees(Request $request)
    {
        $users=User::all('id','name');
        $usersstr="";
        foreach ($users as $user) {
            $usersstr.="id: $user->id, name: $user->name \n";
        }
        $model=config('gemini.model');
        $prompt="Role: Act as a Data Mapping Specialist.\n Task: Match student names from an uploaded PDF to their corresponding IDs provided in the list below, then extract their grades.\n Input 1 (User ID Mapping):\n $usersstr \n Input 2 (PDF Content): \n Please extract the names and grades from the attached PDF file. \n Instructions: \n Use the names in the PDF to find the corresponding ID from Input 1.\n Link the extracted grade to that specific ID. \n If a name in the PDF has a slight spelling variation but is clearly the same person, match it. \n Output Format: \n Return ONLY a raw JSON object with no conversational text or markdown blocks. The format must be exactly: \n {'ID': {'grade': VALUE}} \n Example Output: \n {'2': {'grade': 95}, '3': {'grade': 88}} \n Strict Filtering Rule: If a name exists in the PDF but does NOT have a corresponding ID in 'Input 1', IGNORE it completely. DO NOT include it in the final JSON, and do not attempt to create a dummy ID for it.";
        $upload=Gemini::files()->upload($request->file("document"),MimeType::APPLICATION_PDF,'PDF');
        $genConfig= new GenerationConfig(maxOutputTokens: 8192,responseMimeType: ResponseMimeType::APPLICATION_JSON);
        $result=Gemini::generativeModel($model)->withGenerationConfig($genConfig)->generateContent([
            $prompt,
            new UploadedFile($upload->uri,MimeType::APPLICATION_PDF)
        ]);
        $degrees = json_decode($result->text(), true);
        
        $course=course::find($request->course);
        $course->students()->syncWithoutDetaching($degrees);
    }
}