<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Email;
use App\Models\Hasa;
use App\Models\Hase;
use App\Models\Hasp;
use App\Models\Person;
use App\Models\Phoneno;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::with(['hasa.address', 'hasp.phoneno', 'hase.email'])->get();
        // dd($person);
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
            // 'eaddress' => 'required',
            // 'areacode' => 'required',
            // 'number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
        ]);

        $person = Person::create([
            'lastname' => trim($request->lastname),
            'firstname' => trim($request->firstname),
            'middlename' => trim($request->middlename),
        ]);

        $address = Address::create([
            'province' => trim($request->province),
            'city' => trim($request->city),
            'street' => trim($request->street),
            'streetno' => trim($request->streetno),
        ]);

        $hasa = Hasa::create([
            'id' => $person->id,
            'address_id' => $address->id,
        ]);

        if (!empty($request->eaddress)) {
            $email = Email::create([
                'eaddress' => trim($request->eaddress),
            ]);

            $hase = Hase::create([
                'id' => $person->id,
                'email_id' => $email->id,
            ]);
        }

        if (!empty($request->areacode) && !empty($request->number)) {
            $phoneno = Phoneno::create([
                'areacode' => trim($request->areacode),
                'number' => trim($request->number),
            ]);

            $hasp = Hasp::create([
                'id' => $person->id,
                'phoneno_id' => $phoneno->id,
            ]);
        }

        if ($hasa || $hase || $hasp) {
            return redirect()->route('person')->with(['success' => 'Success']);
        } else {
            return redirect()->route('person')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $person = Person::find($id)->load(['hasa.address', 'hase.email', 'hasp.phoneno']);
        // dd($person);
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

    public function detail($id)
    {
        $person = Person::find($id)->load(['hasa.address', 'hase.email', 'hasp.phoneno']);
        // dd($person);
        return view('person.detail', ['person' => $person]);
    }

    // Detail Address
    public function addAddress($id)
    {
        return view('address.add', ['id' => $id]);
    }

    public function newAddress(Request $request, $id)
    {
        $this->validate($request, [
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
        ]);
        $address = Address::create([
            'province' => trim($request->province),
            'city' => trim($request->city),
            'street' => trim($request->street),
            'streetno' => trim($request->streetno),
        ]);

        Hasa::create([
            'id' => $id,
            'address_id' => $address->id,
        ]);

        return redirect()->route('person.detail', ['id' => $id]);
    }

    public function editAddress($id)
    {
        $address = Person::find($id)->load(['hasa.address']);
        return view('address.edit', ['address' => $address]);
    }

    public function updateAddress(Request $request, $id)
    {
        $this->validate($request, [
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
        ]);

        $address = Address::find($id);
        $address->province = trim($request->province);
        $address->city = trim($request->city);
        $address->street = trim($request->street);
        $address->streetno = trim($request->streetno);
        $address->save();
        return redirect()->route('person.detail', ['id' => $id]);
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->route('person.detail', ['id' => $id]);
    }

    // Detail Email
    public function addEmail()
    {
        return view('email.add');
    }

    public function newEmail(Request $request)
    {
        $this->validate($request, [
            'eaddres' => 'required',
        ]);
        $email = Email::create([
            'eaddres' => trim($request->eaddres),
        ]);
    }

    public function editEmail($id)
    {
        $email = Person::find($id)->load(['hase.email']);
        return view('email.edit', ['email' => $email]);
    }

    public function updateEmail(Request $request, $id)
    {
        $this->validate($request, [
            'eaddress' => 'required',
        ]);

        $email = Email::find($id);
        $email->eaddress = trim($request->eaddress);
        $email->save();
        return redirect()->route('person.detail', ['id' => $id]);
    }

    public function deleteEmail($id)
    {
        $email = Email::find($id);
        $email->delete();
        return redirect()->route('person.detail', ['id' => $id]);
    }

    // Detail Phoneno
    public function addPhoneno()
    {
        return view('phoneno.add');
    }

    public function newPhoneno(Request $request)
    {
        $this->validate($request, [
            'areacode' => 'required',
            'number' => 'required',
        ]);
        $phoneno = Phoneno::create([
            'eaddres' => trim($request->eaddres),
            'number' => trim($request->number),
        ]);
    }

    public function editPhoneno($id)
    {
        $phoneno = Person::find($id)->load(['hasp.phoneno']);
        return view('phoneno.edit', ['phoneno' => $phoneno]);
    }

    public function updatePhoneno(Request $request, $id)
    {
        $this->validate($request, [
            'areacode' => 'required',
            'number' => 'required',
        ]);

        $phoneno = Phoneno::find($id);
        $phoneno->areacode = trim($request->areacode);
        $phoneno->number = trim($request->number);
        $phoneno->save();
        return redirect()->route('person.detail', ['id' => $id]);
    }

    public function deletePhoneno($id)
    {
        $phoneno = Phoneno::find($id);
        $phoneno->delete();
        return redirect()->route('person.detail', ['id' => $id]);
    }
}
