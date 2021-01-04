<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Dons;
use App\Models\Nons;
use App\Models\Nurse;
use App\Models\Receptionist;
use App\Models\Rons;
use Illuminate\Http\Request;

class WorkerShiftController extends Controller
{
    public function index()
    {
        $doctor = Doctor::with(['worker.person', 'dons.shift'])->get();
        $nurse = Nurse::with(['worker.person', 'nons.shift'])->get();
        $receptionist = Receptionist::with(['worker.person', 'rons.shift'])->get();
        return view('worker-shift.index', ['doctor' => $doctor, 'nurse' => $nurse, 'receptionist' => $receptionist]);
    }

    public function editDons($id)
    {
        $dons = Dons::find($id);

        if (empty($dons)) {
            return redirect()->route('worker-shift');
        }

        $dons->load(['shift']);

        return view('worker-shift.edit-dons', ['dons' => $dons]);
    }

    public function updateDons(Request $request, $id)
    {
    }

    public function editNons($id)
    {
        $nons = Nons::find($id);

        if (empty($nons)) {
            return redirect()->route('worker-shift');
        }

        $nons->load(['shift']);

        return view('worker-shift.edit-nons', ['nons' => $nons]);
    }

    public function updateNons(Request $request, $id)
    {
    }

    public function editRons($id)
    {
        $rons = Rons::find($id);

        if (empty($rons)) {
            return redirect()->route('worker-shift');
        }

        $rons->load(['shift']);

        return view('worker-shift.edit-rons', ['rons' => $rons]);
    }

    public function updateRons(Request $request, $id)
    {
    }
}
