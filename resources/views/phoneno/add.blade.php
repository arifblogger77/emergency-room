@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Phone number
            </div>
            <div class="card-body">
                <a href="{{ route('person.detail', ['id' => $id]) }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('phoneno.new', ['id' => $id]) }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Area code</label>
                        <input type="text" name="areacode" class="form-control" placeholder="Area code">

                        @if ($errors->has('areacode'))
                            <div class="text-danger">
                                {{ $errors->first('areacode') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="number" class="form-control" placeholder="Phone">

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
