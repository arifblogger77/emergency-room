<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function index()
    {
        $bed = Bed::all();
        return view('bed.index', ['bed' => $bed]);
    }

    public function add()
    {
        return view('bed.add');
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|numeric',
        ]);

        $bed = Bed::create([
            'number' => trim($request->number),
        ]);

        if ($bed) {
            return redirect()->route('bed')->with(['success' => 'Success']);
        } else {
            return redirect()->route('bed')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $bed = Bed::find($id);
        $bed->delete();

        if ($bed) {
            return redirect()->route('bed')->with(['success' => 'Success']);
        } else {
            return redirect()->route('bed')->with(['error' => 'Failed']);
        }
    }
}
