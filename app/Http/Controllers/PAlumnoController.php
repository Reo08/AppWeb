<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PAlumnoController extends Controller
{
    public function misArchivos(){
        return view('alumno.misArchivos');
    }
}
