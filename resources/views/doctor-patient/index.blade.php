@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Doctor Patient
            </div>
            <div class="card-body">
                <a href="{{ route('casedoc.add') }}" class="btn btn-primary">Casedoc</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($casedoc as $c)
                            {{-- @dd($casedoc) --}}
                            <tr>
                                <td>
                                    {{ $c->patient->person->firstname }}
                                    @isset($c->patient->person->middlename)
                                        {{ $c->patient->person->middlename }}
                                    @endisset
                                    {{ $c->patient->person->lastname }}
                                </td>
                                <td>
                                    {{ $c->dons->doctor->worker->person->firstname }}
                                    @isset($c->dons->doctor->worker->person->middlename)
                                        {{ $c->dons->doctor->worker->person->middlename }}
                                    @endisset
                                    {{ $c->dons->doctor->worker->person->lastname }}
                                </td>
                                <td>
                                    @isset($c->dons->shift->from)
                                        {{ $c->dons->shift->to }}
                                    @endisset
                                </td>

                                <td>
                                    <a href="{{ route('casedoc.delete', ['id' => $c->pid]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('triageby.add') }}" class="btn btn-primary">Triageby</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($triageby) --}}
                        @foreach ($triageby as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($t->patient->person)
                                        {{ $t->patient->person->firstname }}
                                        {{ $t->patient->person->middlename }}
                                        {{ $t->patient->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($t->doctor->worker->person)
                                        {{ $t->doctor->worker->person->firstname }}
                                        {{ $t->doctor->worker->person->middlename }}
                                        {{ $t->doctor->worker->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('triageby.delete', ['id' => $t->pid]) }}"
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
