<?php

namespace App\Http\Controllers;

use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $worker = Worker::with(['person'])->get();
        return view('worker.index', ['worker' => $worker]);
    }
}
