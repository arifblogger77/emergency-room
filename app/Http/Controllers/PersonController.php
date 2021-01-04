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
        $person = Person::find($id);

        if (empty($person)) {
            return redirect()->route('person');
        }

        $person->load(['hasa.address', 'hase.email', 'hasp.phoneno']);
        return view('person.edit', ['person' => $person]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
        ]);

        $person = Person::find($id);

        if (empty($person)) {
            return redirect()->route('person');
        }

        $person->lastname = trim($request->lastname);
        $person->firstname = trim($request->firstname);
        $person->middlename = trim($request->middlename);
        $person->save();

        if ($person) {
            return redirect()->route('person')->with(['success' => 'Success']);
        } else {
            return redirect()->route('person')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $person = Person::find($id);

        if (empty($person)) {
            return redirect()->route('person');
        }

        $person->delete();

        if ($person) {
            return redirect()->route('person')->with(['success' => 'Success']);
        } else {
            return redirect()->route('person')->with(['error' => 'Failed']);
        }
    }

    public function detail($id)
    {
        $person = Person::find($id);

        if (empty($person)) {
            return redirect()->route('person');
        }

        $person->load(['hasa.address', 'hase.email', 'hasp.phoneno']);
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

        $hasa = Hasa::create([
            'id' => $id,
            'address_id' => $address->id,
        ]);

        if ($hasa) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    public function editAddress($id, $idAddress)
    {
        $address = Address::find($idAddress);

        if (empty($address)) {
            return redirect()->route('person');
        }

        return view('address.edit', ['id' => $id, 'address' => $address]);
    }

    public function updateAddress(Request $request, $id, $idAddress)
    {
        $this->validate($request, [
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
            'streetno' => 'required',
        ]);

        $address = Address::find($idAddress);

        if (empty($address)) {
            return redirect()->route('person');
        }

        $address->province = trim($request->province);
        $address->city = trim($request->city);
        $address->street = trim($request->street);
        $address->streetno = trim($request->streetno);
        $address->save();

        if ($address) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    public function deleteAddress($id, $idAddress)
    {
        $address = Address::find($idAddress);

        if (empty($address)) {
            return redirect()->route('person');
        }

        $address->delete();

        if ($address) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    // Detail Email
    public function addEmail($id)
    {
        return view('email.add', ['id' => $id]);
    }

    public function newEmail(Request $request, $id)
    {
        $this->validate($request, [
            'eaddress' => 'required',
        ]);
        $email = Email::create([
            'eaddress' => trim($request->eaddress),
        ]);
        $hase = Hase::create([
            'id' => $id,
            'email_id' => $email->id,
        ]);

        if ($hase) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    public function deleteEmail($id, $idEmail)
    {
        $email = Email::find($idEmail);

        if (empty($email)) {
            return redirect()->route('person');
        }

        $email->delete();

        if ($email) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    // Detail Phoneno
    public function addPhoneno($id)
    {
        return view('phoneno.add', ['id' => $id]);
    }

    public function newPhoneno(Request $request, $id)
    {
        $this->validate($request, [
            'areacode' => 'required|numeric',
            'number' => 'required|numeric',
        ]);
        $phoneno = Phoneno::create([
            'areacode' => trim($request->areacode),
            'number' => trim($request->number),
        ]);
        $hasp = Hasp::create([
            'id' => $id,
            'phoneno_id' => $phoneno->id,
        ]);

        if ($hasp) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }

    public function deletePhoneno($id, $idPhoneno)
    {
        $phoneno = Phoneno::find($idPhoneno);

        if (empty($phoneno)) {
            return redirect()->route('person');
        }

        $phoneno->delete();

        if ($phoneno) {
            return redirect()->route('person.detail', ['id' => $id])->with(['success' => 'Success']);
        } else {
            return redirect()->route('person.detail', ['id' => $id])->with(['error' => 'Failed']);
        }
    }
}
