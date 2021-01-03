@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Detail Person
            </div>
            <div class="card-body">

                <a href="{{ route('person') }}" class="btn btn-info">Kembali</a>
                <br />
                <br />
                <a href="{{ route('person.edit', ['id' => $person->id]) }}" class="btn btn-primary">Edit Person</a>
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Firstname</td>
                            <td>{{ $person->firstname }}</td>
                        </tr>
                        <tr>
                            <td>Middlename</td>
                            <td>{{ $person->middlename }} </td>
                        </tr>
                        <tr>
                            <td>Lastname</td>
                            <td>{{ $person->lastname }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('address.add', ['id' => $person->id]) }}" class="btn btn-primary">Add Address</a>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Street</th>
                            <th>Street Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($person->hasa->isEmpty())
                            <tr>
                                <td colspan="6">No Data</td>
                            </tr>
                        @endif
                        @foreach ($person->hasa as $hasa)
                            @isset($hasa->address)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $hasa->address->province }}
                                    </td>
                                    <td>
                                        {{ $hasa->address->city }}

                                    </td>
                                    <td>
                                        {{ $hasa->address->street }}

                                    </td>
                                    <td>
                                        {{ $hasa->address->streetno }}

                                    </td>
                                    <td>
                                        <a href="{{ route('address.edit', ['id' => $hasa->address->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        @if ($loop->index > 0)
                                            <a href="{{ route('address.delete', ['id' => $hasa->address->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('phoneno.add', ['id' => $person->id]) }}" class="btn btn-primary">Add Phone</a>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Areacode</th>
                            <th>Areacode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($person->hasp->isEmpty())
                            <tr>
                                <td colspan="4">No Data</td>
                            </tr>
                        @endif
                        @foreach ($person->hasp as $hasp)
                            @isset($hasp->phoneno)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $hasp->phoneno->areacode }}
                                    </td>
                                    <td>
                                        {{ $hasp->phoneno->number }}
                                    </td>
                                    <td>
                                        <a href="{{ route('phoneno.edit', ['id' => $hasp->phoneno->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('phoneno.delete', ['id' => $hasp->phoneno->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('email.add', ['id' => $person->id]) }}" class="btn btn-primary">Add Email</a>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($person->hase->isEmpty())
                            <tr>
                                <td colspan="3">No Data</td>
                            </tr>
                        @endif
                        @foreach ($person->hase as $hase)
                            @isset($hase->email)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $hase->email->eaddress }}
                                    </td>
                                    <td>
                                        <a href="{{ route('email.edit', ['id' => $hase->email->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <a href="{{ route('email.delete', ['id' => $hase->email->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
