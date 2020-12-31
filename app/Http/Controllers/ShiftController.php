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

    function new(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
        ]);

        Shift::create([
            'from' => trim($request->from),
            'to' => trim($request->to)
        ]);

        return redirect()->route('shift');
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
        return redirect()->route('shift');
    }

    public function delete($id)
    {
        $shift = Shift::find($id);
        $shift->delete();
        return redirect()->route('shift');
    }
}
