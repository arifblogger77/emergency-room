@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Beda
            </div>
            <div class="card-body">
                <a href="{{ route('beda.add') }}" class="btn btn-primary">Input New Med</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Bedno</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beda as $b)
                            <tr>
                                <td>
                                    @isset($b->patient->person)
                                        {{ $b->patient->person->firstname }}
                                        {{ $b->patient->person->middlename }}
                                        {{ $b->patient->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($b->bed)
                                        {{ $b->bed->number }}
                                    @endisset
                                </td>
                                <td>{{ $b->from }}</td>
                                <td>{{ $b->to }}</td>
                                <td>
                                    <a href="{{ route('beda.edit', ['id' => $b->pid]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('beda.delete', ['id' => $b->pid]) }}"
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
