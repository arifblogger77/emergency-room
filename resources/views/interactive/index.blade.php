@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Interactive Query (Postgre SQL)
            </div>

            <div class="card-body">
                <h3>Query 1</h3>
                <form method="post" action="{{ route('interactive.simple') }}">

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

            <div class="card-body">
                <h3>Query 2</h3>
                <form method="post" action="{{ route('interactive.normal') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Column</label>
                        <input type="text" name="column" class="form-control" placeholder="Column" value="">

                        @if ($errors->has('column'))
                            <div class="text-danger">
                                {{ $errors->first('column') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Table</label>
                        <select class="form-control" name="table">
                            @forelse ($listTable as $t)
                                <option value="{{ $t->tablename }}">
                                    {{ $t->tablename }}
                                </option>
                            @empty
                                <option value=""> - </option>
                            @endforelse
                        </select>

                        @if ($errors->has('table'))
                            <div class="text-danger">
                                {{ $errors->first('table') }}
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
@endsection
