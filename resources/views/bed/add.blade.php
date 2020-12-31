@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add New
            </div>
            <div class="card-body">
                <a href="{{ route('bed') }}" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="{{ route('bed.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" name="number" class="form-control" placeholder="Bed number">

                        @if ($errors->has('number'))
                            <div class="text-danger">
                                {{ $errors->first('number') }}
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
