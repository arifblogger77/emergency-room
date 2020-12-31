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

    public function new(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required'
        ]);

        Person::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename
        ]);

        return redirect('/person');
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
            'firstname' => 'required'
        ]);

        $person = Person::find($id);
        $person->lastname = $request->lastname;
        $person->firstname = $request->firstname;
        $person->middlename = $request->middlename;
        $person->save();
        return redirect('/person');
    }

    public function delete($id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect()->back();
    }
}
