<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index()
    {
        $medication = Medication::all();
        return view('medication.index', ['medication' => $medication]);
    }

    public function add()
    {
        return view('medication.add');
    }

    function new (Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $medication = Medication::create([
            'name' => trim($request->name),
        ]);

        if ($medication) {
            return redirect()->route('medication')->with(['success' => 'Success']);
        } else {
            return redirect()->route('medication')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $medication = Medication::find($id);
        $medication->delete();

        if ($medication) {
            return redirect()->route('medication')->with(['success' => 'Success']);
        } else {
            return redirect()->route('medication')->with(['error' => 'Failed']);
        }
    }
}
