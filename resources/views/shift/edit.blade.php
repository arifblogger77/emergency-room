@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Person
            </div>
            <div class="card-body">
                <a href="{{ route('shift') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('shift.update', ['id' => $shift->shiftid]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>From</label>
                        <input type="datetime-local" name="from" class="form-control"
                            placeholder="Year-month-date Hour:minute:second" value="{{ $shift->from }}">

                        @if ($errors->has('from'))
                            <div class="text-danger">
                                {{ $errors->first('from') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>To</label>
                        <input type="datetime-local" name="to" class="form-control" placeholder="To"
                            value="{{ $shift->to }}">

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
