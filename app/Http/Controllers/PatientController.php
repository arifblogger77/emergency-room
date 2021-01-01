<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::all();
        return view('patient$patient.index', ['patient$patient' => $patient]);
    }
}
