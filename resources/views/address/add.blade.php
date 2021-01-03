@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Address
            </div>
            <div class="card-body">
                <a href="{{ route('person.detail', ['id' => $id]) }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('address.new', ['id' => $id]) }}">

                    {{ csrf_field() }}

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
