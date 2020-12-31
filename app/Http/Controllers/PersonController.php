<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::all();
        return view('person.index', ['person' => $person]);
    }
}
