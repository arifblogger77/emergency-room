<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Med;
use App\Models\Meda;
use App\Models\Nons;
use App\Models\Supby;
use Illuminate\Http\Request;

class NursePatientController extends Controller
{
    public function index()
    {
        $meda = Meda::with(['med', 'nons.nurse.worker.person', 'nons.shift'])->get();
        $supby = Supby::with(['nons.nurse.worker.person', 'bed', 'nons.shift'])->get();
        return view('nurse-patient.index', ['meda' => $meda, 'supby' => $supby]);
    }

    public function addSupby()
    {
        $nons = Nons::all();
        $bed = Bed::all();
        return view('nurse-patient.add-supby', ['nons' => $nons, 'bed' => $bed]);
    }

    public function newSupby(Request $request)
    {
        $this->validate($request, [
            'bedno' => 'required',
            'nid' => 'required',
            'shiftid' => 'required',
        ]);

        $supby = Supby::create([
            'bedno' => trim($request->bedno),
            'nid' => trim($request->nid),
            'shiftid' => trim($request->shiftid),
        ]);

        if ($supby) {
            return redirect()->route('nurse-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nurse-patient')->with(['error' => 'Failed']);
        }
    }

    public function deleteSupby($id)
    {
        $supby = Supby::find($id);

        if (empty($supby)) {
            return redirect()->route('nurse-patient');
        }

        $supby->delete();

        if ($supby) {
            return redirect()->route('nurse-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nurse-patient')->with(['error' => 'Failed']);
        }
    }

    public function addMeda()
    {
        $nons = Nons::all();
        $med = Med::all();
        return view('nurse-patient.add-meda', ['nons' => $nons, 'med' => $med]);
    }


    public function newMeda(Request $request)
    {
        $this->validate($request, [
            'px' => 'required',
            'nid' => 'required',
            'shiftid' => 'required',
        ]);

        $meda = Meda::create([
            'px' => trim($request->px),
            'nid' => trim($request->nid),
            'shiftid' => trim($request->shiftid),
        ]);

        if ($meda) {
            return redirect()->route('nurse-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nurse-patient')->with(['error' => 'Failed']);
        }
    }

    public function deleteMeda($id)
    {
        $meda = Meda::find($id);

        if (empty($meda)) {
            return redirect()->route('nurse-patient');
        }

        $meda->delete();

        if ($meda) {
            return redirect()->route('nurse-patient')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nurse-patient')->with(['error' => 'Failed']);
        }
    }
}
