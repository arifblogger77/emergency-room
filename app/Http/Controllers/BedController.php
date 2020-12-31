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
            'number' => 'required',
        ]);

        Bed::create([
            'number' => trim($request->number)
        ]);

        return redirect()->route('bed');
    }

    public function delete($id)
    {
        $bed = Bed::find($id);
        $bed->delete();
        return redirect()->route('bed');
    }
}
