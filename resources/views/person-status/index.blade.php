@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Person Status
            </div>
            <div class="card-body">
                <a href="{{ route('patient.add') }}" class="btn btn-primary">Patient</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient as $p)
                            {{-- @dd($p) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $p->person->firstname }}
                                    @isset($p->person->middlename)
                                        {{ $p->person->middlename }}
                                    @endisset
                                    {{ $p->person->lastname }}
                                </td>
                                <td>
                                    <a href="{{ route('patient.delete', ['id' => $p->pid]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('worker.add') }}" class="btn btn-primary">Worker</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($worker as $w)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($w->person)
                                        {{ $w->person->firstname }}
                                        {{ $w->person->middlename }}
                                        {{ $w->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($w->nurse)
                                        {{ 'Nurse' }}
                                    @endisset
                                    @isset($w->doctor)
                                        {{ 'Doctor' }}
                                    @endisset
                                    @isset($w->receptionist)
                                        {{ 'Receptionist' }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('worker.delete', ['id' => $w->wid]) }}"
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
