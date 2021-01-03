@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
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
                                    @isset($p->hase[0]->email)
                                        {{ $p->hase[0]->email->eaddress }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($p->hasp[0]->phoneno)
                                        {{ $p->hasp[0]->phoneno->areacode }}
                                        {{ $p->hasp[0]->phoneno->number }}
                                    @endisset
                                </td>
                                <td>

                                    @isset($p->hasa[0]->address)
                                        {{ $p->hasa[0]->address->province }},
                                        {{ $p->hasa[0]->address->city }},
                                        {{ $p->hasa[0]->address->street }},
                                        {{ $p->hasa[0]->address->streetno }}
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('person.detail', ['id' => $p->id]) }}" class="btn btn-info">Detail</a>
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
