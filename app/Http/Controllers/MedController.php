<?php

namespace App\Http\Controllers;

use App\Models\Med;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function index()
    {
        $med = Med::all();
        //dd($med);
        return view('med.index', ['med' => $med]);
    }

    public function add()
    {
        return view('med.add');
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
            'med' => 'required',
            'dosage' => 'required',
            'medfrom' => 'required',
            'medto' => 'required',
            'howoften' => 'required',
        ]);

        Med::create([
            'pid' => trim($request->pid),
            'did' => trim($request->did),
            'med' => trim($request->med),
            'dosage' => trim($request->dosage),
            'medfrom' => trim($request->medfrom),
            'medto' => trim($request->medto),
            'howoften' => trim($request->howoften),
        ]);

        return redirect()->route('med');
    }

    public function edit($id)
    {
        $med = Med::find($id);
        return view('med.edit', ['med' => $med]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'pid' => 'required',
            'did' => 'required',
            'med' => 'required',
            'dosage' => 'required',
            'medfrom' => 'required',
            'medto' => 'required',
            'howoften' => 'required',
        ]);

        $med = Med::find($id);
        $med->pid = trim($request->pid);
        $med->did = trim($request->did);
        $med->med = trim($request->med);
        $med->dosage = trim($request->dosage);
        $med->medfrom = trim($request->medfrom);
        $med->medto = trim($request->medto);
        $med->howoften = trim($request->howoften);
        $med->save();
        return redirect()->route('med');
    }

    public function delete($id)
    {
        $med = Med::find($id);
        $med->delete();
        return redirect()->route('med');
    }
}
