@extends('layouts.app')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2-single').select2({
                theme: 'bootstrap4',
            });
        });

    </script>
@endpush

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Shift
            </div>
            <div class="card-body">
                <a href="{{ route('worker-shift') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('nurse.update', ['id' => $nons->nid]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Name</label>
                        <select class="form-control" name="nid">
                            <option value="{{ $nons->nid }}" selected>
                                {{ $nons->nurse->worker->person->firstname }}
                                {{ $nons->nurse->worker->person->middlename }}
                                {{ $nons->nurse->worker->person->lastname }}
                            </option>
                        </select>

                        @if ($errors->has('nid'))
                            <div class="text-danger">
                                {{ $errors->first('nid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Person</label>
                        <select class="form-control select2-single" name="shiftid">
                            @forelse ($shift as $s)
                                <option value="{{ $s->shiftid }}" {{ $s->shiftid == $nons->shiftid ? 'selected' : '' }}>
                                    {{ $s->from }} - {{ $s->to }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('shift'))
                            <div class="text-danger">
                                {{ $errors->first('shift') }}
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
