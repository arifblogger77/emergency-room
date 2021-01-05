<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InteractiveController extends Controller
{
    public function index()
    {
        $listTable = $this->listTables();
        $listTable = array_splice($listTable, 4);
        return view('interactive.index', ['listTable' => $listTable]);
    }

    public function simple(Request $request)
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

    public function normal(Request $request)
    {
        $this->validate($request, [
            'column' => 'required',
            'table' => 'required'
        ]);

        try {
            $interactive = DB::select(DB::raw("SELECT $request->column FROM $request->table"));
        } catch (\Throwable $th) {

            $interactive = array('message' => 'Error query');
        }

        return response()->json($interactive, 200);
    }

    public function listTables()
    {
        return $tables = DB::getSchemaBuilder()->getAllTables();

        // return response()->json($tables, 200);
    }
}
