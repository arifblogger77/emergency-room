<?php

namespace App\Http\Controllers;

use App\Models\Adm;
use App\Models\Patient;
use App\Models\Receptionist;
use App\Models\Shift;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function index()
    {
        $adm = Adm::with(['patient.person', 'receptionist.worker.person'])->get();
        return view('adm.index', ['adm' => $adm]);
    }

    public function add()
    {
        $shift = Shift::all();
        $receptionist = Receptionist::all();
        $patient = Patient::all();
        return view('adm.add', ['patient' => $patient, 'receptionist' => $receptionist, 'shift' => $shift]);
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'rid' => 'required',
            'shiftid' => 'required',
            'admission' => 'required',
        ]);

        $adm = Adm::create([
            'pid' => trim($request->pid),
            'rid' => trim($request->rid),
            'shiftid' => trim($request->shiftid),
            'admission' => trim($request->admission),
        ]);

        if ($adm) {
            return redirect()->route('adm')->with(['success' => 'Success']);
        } else {
            return redirect()->route('adm')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $adm = Adm::find($id);

        if (empty($adm)) {
            return redirect()->route('adm');
        }

        $adm->delete();

        if ($adm) {
            return redirect()->route('adm')->with(['success' => 'Success']);
        } else {
            return redirect()->route('adm')->with(['error' => 'Failed']);
        }
    }
}
