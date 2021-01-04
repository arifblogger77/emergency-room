@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Worker Shift
            </div>
            <div class="card-body">

                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th colspan=4>Doctor</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctor as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($d->worker->person)
                                        {{ $d->worker->person->firstname }}
                                        {{ $d->worker->person->middlename }}
                                        {{ $d->worker->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($d->dons->shift)
                                        {{ $d->dons->shift->from }} - {{ $d->dons->shift->to }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('doctor.edit', ['id' => $d->did]) }}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th colspan=4>Nurse</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nurse as $n)
                            {{-- @dd($n) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($n->worker->person)
                                        {{ $n->worker->person->firstname }}
                                        {{ $n->worker->person->middlename }}
                                        {{ $n->worker->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($n->nons->shift)
                                        {{ $n->nons->shift->from }} - {{ $n->nons->shift->to }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('nurse.edit', ['id' => $n->nid]) }}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th colspan=4>Receptionist</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receptionist as $r)
                            {{-- @dd($r) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($r->worker->person)
                                        {{ $r->worker->person->firstname }}
                                        {{ $r->worker->person->middlename }}
                                        {{ $r->worker->person->lastname }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($r->rons->shift)
                                        {{ $r->rons->shift->from }} - {{ $r->rons->shift->to }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('receptionist.edit', ['id' => $r->rid]) }}"
                                        class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
