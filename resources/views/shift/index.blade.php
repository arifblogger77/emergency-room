@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Person
            </div>
            <div class="card-body">
                <a href="{{ route('shift.add') }}" class="btn btn-primary">Input New Shift</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shift as $s)
                            <tr>
                                <td>{{ $s->shiftid }}</td>
                                <td>{{ $s->from }}</td>
                                <td>{{ $s->to }}</td>
                                <td>
                                    <a href="{{ route('shift.edit', ['id' => $s->shiftid]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('shift.delete', ['id' => $s->shiftid]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
