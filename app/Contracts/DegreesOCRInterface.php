<?php

namespace App\Contracts;

use Illuminate\Http\Request;


interface DegreesOCRInterface{
    function getDegrees(Request $file);
}