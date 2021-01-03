<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shift = Shift::all();
        return view('shift.index', ['shift' => $shift]);
    }

    public function add()
    {
        return view('shift.add');
    }

    function new (Request $request) {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
        ]);

        $shift = Shift::create([
            'from' => trim($request->from),
            'to' => trim($request->to),
        ]);

        if ($shift) {
            return redirect()->route('shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('shift')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $shift = Shift::find($id);
        return view('shift.edit', ['shift' => $shift]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
        ]);

        $shift = Shift::find($id);
        $shift->from = trim($request->from);
        $shift->to = trim($request->to);
        $shift->save();

        if ($shift) {
            return redirect()->route('shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('shift')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $shift = Shift::find($id);
        $shift->delete();

        if ($shift) {
            return redirect()->route('shift')->with(['success' => 'Success']);
        } else {
            return redirect()->route('shift')->with(['error' => 'Failed']);
        }
    }
}
