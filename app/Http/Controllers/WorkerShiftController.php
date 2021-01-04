<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Dons;
use App\Models\Nons;
use App\Models\Nurse;
use App\Models\Receptionist;
use App\Models\Rons;
use App\Models\Shift;
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
        $shift = Shift::all();
        $dons = Dons::find($id);

        if (empty($dons)) {
            return redirect()->route('worker-shift');
        }

        $dons->load(['shift']);

        return view('worker-shift.edit-dons', ['dons' => $dons, 'shift' => $shift]);
    }

    public function updateDons(Request $request, $id)
    {
        $this->validate($request, [
            'did' => 'required',
            'shiftid' => 'required',
        ]);

        $dons = Dons::find($id);

        if (empty($dons)) {
            return redirect()->route('worker-shift');
        }

        $dons->did = trim($request->did);
        $dons->shiftid = trim($request->shiftid);
        $dons->save();

        if ($dons) {
            return redirect()->route('worker-shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('worker-shift')->with(['error' => 'Failed']);
        }
    }

    public function editNons($id)
    {
        $shift = Shift::all();
        $nons = Nons::find($id);

        if (empty($nons)) {
            return redirect()->route('worker-shift');
        }

        $nons->load(['shift']);

        return view('worker-shift.edit-nons', ['nons' => $nons, 'shift' => $shift]);
    }

    public function updateNons(Request $request, $id)
    {
        $this->validate($request, [
            'nid' => 'required',
            'shiftid' => 'required',
        ]);

        $nons = Nons::find($id);

        if (empty($nons)) {
            return redirect()->route('worker-shift');
        }

        $nons->nid = trim($request->nid);
        $nons->shiftid = trim($request->shiftid);
        $nons->save();

        if ($nons) {
            return redirect()->route('worker-shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('worker-shift')->with(['error' => 'Failed']);
        }
    }

    public function editRons($id)
    {
        $shift = Shift::all();
        $rons = Rons::find($id);

        if (empty($rons)) {
            return redirect()->route('worker-shift');
        }

        $rons->load(['shift']);

        return view('worker-shift.edit-rons', ['rons' => $rons, 'shift' => $shift]);
    }

    public function updateRons(Request $request, $id)
    {
        $this->validate($request, [
            'rid' => 'required',
            'shiftid' => 'required',
        ]);

        $rons = Rons::find($id);

        if (empty($rons)) {
            return redirect()->route('worker-shift');
        }

        $rons->rid = trim($request->rid);
        $rons->shiftid = trim($request->shiftid);
        $rons->save();

        if ($rons) {
            return redirect()->route('worker-shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('worker-shift')->with(['error' => 'Failed']);
        }
    }
}
