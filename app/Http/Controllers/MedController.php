<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Med;
use App\Models\Medication;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function index()
    {
        $med = Med::with(['patient.person', 'doctor.worker.person', 'medication'])->get();
        return view('med.index', ['med' => $med]);
    }

    public function add()
    {
        $doctor = Doctor::all();
        $patient = Patient::all();
        $medication = Medication::all();
        return view('med.add', ['medication' => $medication, 'patient' => $patient, 'doctor' => $doctor]);
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
            'medication_id' => 'required',
            'dosage' => 'required|numeric',
            'medfrom' => 'required',
            'medto' => 'required',
            'howoften' => 'required|numeric',
        ]);

        $med = Med::create([
            'pid' => trim($request->pid),
            'did' => trim($request->did),
            'medication_id' => trim($request->medication_id),
            'dosage' => trim($request->dosage),
            'medfrom' => trim($request->medfrom),
            'medto' => trim($request->medto),
            'howoften' => trim($request->howoften),
        ]);

        if ($med) {
            return redirect()->route('med')->with(['success' => 'Success']);
        } else {
            return redirect()->route('med')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $doctor = Doctor::all();
        $patient = Patient::all();
        $medication = Medication::all();
        $med = Med::find($id);

        if (empty($med)) {
            return redirect()->route('med');
        }

        return view('med.edit', ['med' => $med, 'patient' => $patient, 'doctor' => $doctor, 'medication' => $medication]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
            'medication_id' => 'required',
            'dosage' => 'required|numeric',
            'medfrom' => 'required',
            'medto' => 'required',
            'howoften' => 'required|numeric',
        ]);

        $med = Med::find($id);

        if (empty($med)) {
            return redirect()->route('med');
        }

        $med->pid = trim($request->pid);
        $med->did = trim($request->did);
        $med->medication_id = trim($request->medication_id);
        $med->dosage = trim($request->dosage);
        $med->medfrom = trim($request->medfrom);
        $med->medto = trim($request->medto);
        $med->howoften = trim($request->howoften);
        $med->save();

        if ($med) {
            return redirect()->route('med')->with(['success' => 'Success']);
        } else {
            return redirect()->route('med')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $med = Med::find($id);

        if (empty($med)) {
            return redirect()->route('med');
        }

        $med->delete();

        if ($med) {
            return redirect()->route('med')->with(['success' => 'Success']);
        } else {
            return redirect()->route('med')->with(['error' => 'Failed']);
        }
    }
}
