<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function interactive(Request $request)
    {
        $this->validate($request, [
            'interactive' => 'required',
        ]);

        try {
            $interactive = DB::select(DB::raw($request->interactive));
        } catch (\Throwable $th) {

            $interactive = array('message' => 'Error query');
        }

        return response()->json($interactive, 200);
    }
}
