<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Dons;
use App\Models\Nons;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Person;
use App\Models\Rons;
use App\Models\Shift;
use App\Models\Worker;
use Illuminate\Http\Request;

class PersonStatusController extends Controller
{
    public function index()
    {
        $patient = Patient::with(['person'])->get();
        $worker = Worker::with(['person'])->get();
        return view('person-status.index', ['patient' => $patient, 'worker' => $worker]);
    }

    public function addPatient()
    {
        $person = Person::all();
        return view('person-status.add-patient', ['person' => $person]);
    }

    public function newPatient(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
        ]);

        $patient = Patient::create([
            'pid' => trim($request->pid),
        ]);

        if ($patient) {
            return redirect()->route('status')->with(['success' => 'Success']);
        } else {
            return redirect()->route('status')->with(['error' => 'Failed']);
        }
    }

    public function deletePatient($id)
    {
        $patient = Patient::find($id);

        if (empty($patient)) {
            return redirect()->route('status');
        }

        $patient->delete();

        if ($patient) {
            return redirect()->route('status')->with(['success' => 'Success']);
        } else {
            return redirect()->route('status')->with(['error' => 'Failed']);
        }
    }

    public function addWorker()
    {
        $person = Person::all();
        $shift = Shift::all();
        return view('person-status.add-worker', ['person' => $person, 'shift' => $shift]);
    }

    public function newWorker(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'wid' => 'required',
            'shift' => 'required',
        ]);

        $worker = Worker::create([
            'wid' => trim($request->wid),
        ]);

        if ($request->status == 'nurse') {
            $nurse = Nurse::create([
                'nid' => trim($request->wid),
            ]);

            $nons = Nons::create([
                'nid' => trim($nurse->nid),
                'shiftid' => trim($request->shift),
            ]);

        } else if ($request->status == 'doctor') {
            $doctor = Doctor::create([
                'did' => trim($request->wid),
            ]);

            $dons = Dons::create([
                'did' => trim($doctor->did),
                'shiftid' => trim($request->shift),
            ]);

        } elseif ($request->status == 'receptionist') {
            $receptionist = Rons::create([
                'rid' => trim($request->wid),
            ]);

            $rons = Rons::create([
                'rid' => trim($receptionist->rid),
                'shiftid' => trim($request->shift),
            ]);

        }

        if (($worker) && ($nons || $dons || $rons)) {
            return redirect()->route('status')->with(['success' => 'Success']);
        } else {
            return redirect()->route('status')->with(['error' => 'Failed']);
        }
    }

    public function deleteWorker($id)
    {
        $worker = Worker::find($id);

        if (empty($worker)) {
            return redirect()->route('status');
        }

        $worker->delete();

        if ($worker) {
            return redirect()->route('status')->with(['success' => 'Success']);
        } else {
            return redirect()->route('status')->with(['error' => 'Failed']);
        }
    }
}
