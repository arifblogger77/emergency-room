@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Email
            </div>
            <div class="card-body">
                <a href="{{ route('person.detail', ['id' => $id]) }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('email.new', ['id' => $id]) }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="eaddress" class="form-control" placeholder="Email">

                        @if ($errors->has('eaddress'))
                            <div class="text-danger">
                                {{ $errors->first('eaddress') }}
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
