@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Medication
            </div>
            <div class="card-body">
                <a href="{{ route('medication') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('medication.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Medication name">

                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
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
