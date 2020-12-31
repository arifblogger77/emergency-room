@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add New
            </div>
            <div class="card-body">
                <a href="{{ route('person') }}" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="{{ route('person.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name">

                        @if ($errors->has('lastname'))
                            <div class="text-danger">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name">

                        @if ($errors->has('firstname'))
                            <div class="text-danger">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name">

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                </form>

            </div>
        </div>
    </div>
@endsection
