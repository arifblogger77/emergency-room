@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Nurse Patient
            </div>


            <div class="card-body">
                <a href="{{ route('meda.add') }}" class="btn btn-primary">Meda</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Med</th>
                            <th>Nurse</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meda as $m)
                            {{-- @dd($meda) --}}
                            <tr>
                                <td>
                                    @isset($m->med)
                                        {{ $m->med->patient->person->firstname }} - Doctor
                                        {{ $m->med->doctor->worker->person->firstname }}
                                    @endisset
                                </td>
                                <td>
                                    {{ $m->nons->nurse->worker->person->firstname }}
                                    @isset($m->nons->nurse->worker->person->middlename)
                                        {{ $m->nons->nurse->worker->person->middlename }}
                                    @endisset
                                    {{ $m->nons->nurse->worker->person->lastname }}
                                </td>
                                <td>
                                    @isset($m->nons->shift)
                                        {{ $m->nons->shift->to }} - {{ $m->nons->shift->to }}
                                    @endisset
                                </td>

                                <td>
                                    <a href="{{ route('meda.delete', ['id' => $m->px]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('supby.add') }}" class="btn btn-primary">Supby</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Bed Number</th>
                            <th>Nurse</th>
                            <th>Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($supby) --}}
                        @foreach ($supby as $s)
                            <tr>
                                <td>
                                    @isset($s->bed)
                                        {{ $s->bed->number }}
                                    @endisset
                                </td>
                                <td>
                                    {{ $s->nons->nurse->worker->person->firstname }}
                                    @isset($s->nons->nurse->worker->person->middlename)
                                        {{ $s->nons->nurse->worker->person->middlename }}
                                    @endisset
                                    {{ $s->nons->nurse->worker->person->lastname }}
                                </td>
                                <td>
                                    @isset($m->nons->shift)
                                        {{ $m->nons->shift->to }} - {{ $m->nons->shift->to }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('supby.delete', ['id' => $s->id]) }}"
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
