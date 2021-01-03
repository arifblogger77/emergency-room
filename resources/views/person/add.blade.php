@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add New
            </div>
            <div class="card-body">
                <a href="{{ route('person') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('person.new') }}">

                    {{ csrf_field() }}

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
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name">

                        @if ($errors->has('lastname'))
                            <div class="text-danger">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="eaddress" class="form-control" placeholder="Email">

                        @if ($errors->has('eaddress'))
                            <div class="text-danger">
                                {{ $errors->first('eaddress') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Area Code</label>
                        <input type="text" name="areacode" class="form-control" placeholder="62">

                        @if ($errors->has('areacode'))
                            <div class="text-danger">
                                {{ $errors->first('areacode') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Number</label>
                        <input type="number" name="number" class="form-control" placeholder="Number">

                        @if ($errors->has('number'))
                            <div class="text-danger">
                                {{ $errors->first('number') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" name="province" class="form-control" placeholder="Province">

                        @if ($errors->has('province'))
                            <div class="text-danger">
                                {{ $errors->first('province') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="City">

                        @if ($errors->has('city'))
                            <div class="text-danger">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Street</label>
                        <input type="text" name="street" class="form-control" placeholder="Street">

                        @if ($errors->has('street'))
                            <div class="text-danger">
                                {{ $errors->first('street') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Street No</label>
                        <input type="text" name="streetno" class="form-control" placeholder="Street No">

                        @if ($errors->has('streetno'))
                            <div class="text-danger">
                                {{ $errors->first('streetno') }}
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
