<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('doctor$doctor.index', ['doctor$doctor' => $doctor]);
    }
}
