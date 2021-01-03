<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor = Doctor::with(['person'])->get();
        return view('doctor.index', ['doctor' => $doctor]);
    }
}
