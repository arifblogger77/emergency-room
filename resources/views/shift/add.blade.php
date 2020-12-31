@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add New
            </div>
            <div class="card-body">
                <a href="{{ route('shift') }}" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="{{ route('shift.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="Y-m-d H:i:s" name="from" class="form-control"
                            placeholder="Year-month-date Hour:minute:second">

                        @if ($errors->has('from'))
                            <div class="text-danger">
                                {{ $errors->first('from') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="Y-m-d H:i:s" name="to" class="form-control"
                            placeholder="Year-month-date Hour:minute:second">

                        @if ($errors->has('to'))
                            <div class="text-danger">
                                {{ $errors->first('to') }}
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
