@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Admission
            </div>
            <div class="card-body">
                <a href="{{ route('adm.add') }}" class="btn btn-primary">Input New Adm</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Receptionist</th>
                            <th>Shift</th>
                            <th>Admission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adm as $a)
                            <tr>
                                <td>
                                    @isset($a->patient->person)
                                        {{ $a->patient->person->firstname }}
                                        {{ $a->patient->person->middlename }}
                                        {{ $a->patient->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($a->receptionist->worker->person)
                                        {{ $a->receptionist->worker->person->firstname }}
                                        {{ $a->receptionist->worker->person->middlename }}
                                        {{ $a->receptionist->worker->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($a->shift)
                                        {{ $a->shift->worker->from }} -
                                        {{ $a->shift->worker->to }}
                                    @endisset
                                </td>
                                <td>{{ $a->admission }}</td>
                                <td>
                                    <a href="{{ route('adm.edit', ['id' => $a->pid]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('adm.delete', ['id' => $a->pid]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
