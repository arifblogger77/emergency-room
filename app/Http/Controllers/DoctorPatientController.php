<?php

namespace App\Http\Controllers;

use App\Models\Casedoc;
use App\Models\Doctor;
use App\Models\Dons;
use App\Models\Patient;
use App\Models\Triageby;
use Illuminate\Http\Request;

class DoctorPatientController extends Controller
{
    public function index()
    {
        $triageby = Triageby::with(['patient.person', 'doctor.worker.person'])->get();
        $casedoc = Casedoc::with(['dons.doctor.worker.person', 'dons.shift', 'patient.person'])->get();
        return view('doctor-patient.index', ['triageby' => $triageby, 'casedoc' => $casedoc]);
    }

    public function addCasedoc()
    {
        $dons = Dons::all();
        $patient = Patient::all();
        return view('doctor-patient.add-casedoc', ['dons' => $dons, 'patient' => $patient]);
    }

    public function newCasedoc(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
            'shiftid' => 'required',
        ]);

        $casedoc = Casedoc::create([
            'pid' => trim($request->pid),
            'did' => trim($request->did),
            'shiftid' => trim($request->shiftid),
        ]);

        if ($casedoc) {
            return redirect()->route('doctor-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('doctor-patient')->with(['error' => 'Failed']);
        }
    }

    public function deleteCasedoc($id)
    {
        $casedoc = Casedoc::find($id);

        if (empty($casedoc)) {
            return redirect()->route('doctor-patient');
        }

        $casedoc->delete();

        if ($casedoc) {
            return redirect()->route('doctor-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('doctor-patient')->with(['error' => 'Failed']);
        }
    }

    public function addTriageby()
    {
        $doctor = Doctor::all();
        $patient = Patient::all();
        return view('doctor-patient.add-triageby', ['doctor' => $doctor, 'patient' => $patient]);
    }


    public function newTriageby(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
        ]);

        $triageby = Triageby::create([
            'pid' => trim($request->pid),
            'did' => trim($request->did),
        ]);

        if ($triageby) {
            return redirect()->route('doctor-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('doctor-patient')->with(['error' => 'Failed']);
        }
    }

    public function deleteTriageby($id)
    {
        $triageby = Triageby::find($id);

        if (empty($triageby)) {
            return redirect()->route('doctor-patient');
        }

        $triageby->delete();

        if ($triageby) {
            return redirect()->route('doctor-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('doctor-patient')->with(['error' => 'Failed']);
        }
    }
}
