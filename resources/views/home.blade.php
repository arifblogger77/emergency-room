@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome!') }}
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('home.interactive') }}">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Query</label>
                                <input type="text" name="interactive" class="form-control" placeholder="Query" value="">

                                @if ($errors->has('interactive'))
                                    <div class="text-danger">
                                        {{ $errors->first('interactive') }}
                                    </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Kirim">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
