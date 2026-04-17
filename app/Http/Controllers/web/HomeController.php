<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Admin\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data['user']=Auth::user();
        return view("web.home")->with($data);
    }
}
