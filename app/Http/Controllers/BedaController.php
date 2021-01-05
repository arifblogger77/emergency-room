<?php

namespace App\Http\Controllers;

use App\Models\Beda;
use App\Models\Bed;
use App\Models\Patient;
use Illuminate\Http\Request;

class BedaController extends Controller
{
    public function index()
    {
        $beda = Beda::with(['patient.person', 'bed'])->get();
        return view('beda.index', ['beda' => $beda]);
    }

    public function add()
    {
        $bed = Bed::all();
        $patient = Patient::all();
        return view('beda.add', ['patient' => $patient, 'bed' => $bed]);
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'bedno' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
        ]);

        $beda = Beda::create([
            'pid' => trim($request->pid),
            'bedno' => trim($request->bedno),
            'from' => trim($request->from),
            'to' => trim($request->to),
        ]);

        if ($beda) {
            return redirect()->route('beda')->with(['success' => 'Success']);
        } else {
            return redirect()->route('beda')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $bed = Bed::all();
        $patient = Patient::all();
        $beda = Beda::find($id);

        if (empty($beda)) {
            return redirect()->route('beda');
        }

        return view('beda.edit', ['beda' => $beda, 'patient' => $patient, 'bed' => $bed]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'bedno' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
        ]);

        $beda = Beda::find($id);

        if (empty($beda)) {
            return redirect()->route('beda');
        }

        $beda->pid = trim($request->pid);
        $beda->bedno = trim($request->bedno);
        $beda->from = trim($request->from);
        $beda->to = trim($request->to);
        $beda->save();

        if ($beda) {
            return redirect()->route('beda')->with(['success' => 'Success']);
        } else {
            return redirect()->route('beda')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $beda = Beda::find($id);

        if (empty($beda)) {
            return redirect()->route('beda');
        }

        $beda->delete();

        if ($beda) {
            return redirect()->route('beda')->with(['success' => 'Success']);
        } else {
            return redirect()->route('beda')->with(['error' => 'Failed']);
        }
    }
}
