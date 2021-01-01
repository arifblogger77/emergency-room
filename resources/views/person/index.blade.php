@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Person
            </div>
            <div class="card-body">
                <a href="{{ route('person.add') }}" class="btn btn-primary">Input New Person</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($person as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->lastname }}</td>
                                <td>{{ $p->firstname }}</td>
                                <td>{{ $p->middlename }}</td>
                                <td>{{ Hasa::find($p->id)->get() }}
                                </td>
                                <td>
                                    <a href="{{ route('person.edit', ['id' => $p->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('person.delete', ['id' => $p->id]) }}"
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
