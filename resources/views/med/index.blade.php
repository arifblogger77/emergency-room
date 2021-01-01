@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Med
            </div>
            <div class="card-body">
                <a href="{{ route('med.add') }}" class="btn btn-primary">Input New Med</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Med</th>
                            <th>Dosage</th>
                            <th>Med From</th>
                            <th>Med To</th>
                            <th>How often</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($med as $m)
                            <tr>
                                <td>{{ $m->px }}</td>
                                <td>{{ $m->firstname . ' ' . $m->firstname }}</td>
                                <td>{{ $m->firstname }}</td>
                                <td>{{ $m->med }}</td>
                                <td>{{ $m->dosage }}</td>
                                <td>{{ $m->medfrom }}</td>
                                <td>{{ $m->medto }}</td>
                                <td>{{ $m->howoften }}</td>
                                <td>
                                    <a href="{{ route('med.edit', ['id' => $m->px]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('med.delete', ['id' => $m->px]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
