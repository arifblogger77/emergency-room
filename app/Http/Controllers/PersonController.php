<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Person;
use App\Models\Phoneno;
use App\Models\Address;
use App\Models\Hasa;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::with(['hasa.address', 'hase.email', 'hasp.phoneno'])->get();
        return view('person.index', ['person' => $person]);
    }

    public function add()
    {
        return view('person.add');
    }

    function new(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'eaddress' => 'required',
            'areacode' => 'required',
            'number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
        ]);

        Person::create([
            'lastname' => trim($request->lastname),
            'firstname' => trim($request->firstname),
            'middlename' => trim($request->middlename),
        ]);

        Email::create([
            'eaddress' => trim($request->eaddress),
        ]);

        Phoneno::create([
            'areacode' => trim($request->areacode),
            'number' => trim($request->number),
        ]);

        Address::create([
            'province' => trim($request->province),
            'city' => trim($request->city),
            'street' => trim($request->street),
            'streetno' => trim($request->streetno),
        ]);

        return redirect()->route('person');
    }

    public function edit($id)
    {
        $person = Person::find($id)->with(['hasa.address', 'hase.email', 'hasp.phoneno'])->get();
        return view('person.edit', ['person' => $person]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'eaddress' => 'required',
            'areacode' => 'required',
            'number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
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
