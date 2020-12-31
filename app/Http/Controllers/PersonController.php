<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::all();
        return view('person.index', ['person' => $person]);
    }

    public function add()
    {
        return view('person.add');
    }

    function new (Request $request) {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
        ]);

        Person::create([
            'lastname' => trim($request->lastname),
            'firstname' => trim($request->firstname),
            'middlename' => trim($request->middlename),
        ]);

        return redirect()->route('person');
    }

    public function edit($id)
    {
        $person = Person::find($id);
        return view('person.edit', ['person' => $person]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
        ]);

        $person = Person::find($id);
        $person->lastname = trim($request->lastname);
        $person->firstname = trim($request->firstname);
        $person->middlename = trim($request->middlename);
        $person->save();
        return redirect()->route('person');
    }

    public function delete($id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect()->route('person');
    }
}
