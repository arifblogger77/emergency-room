@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Person
            </div>
            <div class="card-body">
                <a href="{{ route('bed.add') }}" class="btn btn-primary">Input New Bed</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bed as $b)
                            <tr>
                                <td>{{ $b->number }}</td>
                                <td>
                                    <a href="{{ route('bed.delete', ['id' => $b->number]) }}"
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
