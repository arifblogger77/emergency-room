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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($person as $p)
                            <tr>
                                {{-- {{ dd($p) }} --}}
                                <td>{{ $p->id }}</td>
                                <td>
                                    {{ $p->firstname }}
                                    @isset($p->middlename)
                                        {{ $p->middlename }}
                                    @endisset
                                    {{ $p->lastname }}
                                </td>
                                <td>
                                    @isset($p->hase->email)
                                        {{ $p->hase->eaddress }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($p->hasp->phoneno)
                                        {{ $p->hasp->areacode }}
                                        {{ $p->hasp->number }}
                                    @endisset
                                </td>
                                <td>

                                    @isset($p->hasa->address)
                                        {{ $p->hasa->address->province }},
                                        {{ $p->hasa->address->city }},
                                        {{ $p->hasa->address->street }},
                                        {{ $p->hasa->address->streetno }}
                                    @endisset
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
