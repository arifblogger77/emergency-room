<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::with(['person'])->get();
        return view('patient.index', ['patient' => $patient]);
    }
}
