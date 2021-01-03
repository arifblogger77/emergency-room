@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Medication
            </div>
            <div class="card-body">
                <a href="{{ route('medication.add') }}" class="btn btn-primary">Input New Medication</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medication as $m)
                            <tr>
                                <td>{{ $m->name }}</td>
                                <td>
                                    <a href="{{ route('medication.delete', ['id' => $m->name]) }}"
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
