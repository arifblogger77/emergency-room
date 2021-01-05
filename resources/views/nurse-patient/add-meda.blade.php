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
                Add New Med A
            </div>
            <div class="card-body">
                <a href="{{ route('nurse-patient') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('meda.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Med</label>
                        <select class="form-control select2-single" name="px">
                            @forelse ($med as $m)
                                <option value="{{ $m->px }}">{{ $m->patient->person->firstname }} - Doctor
                                    {{ $m->doctor->worker->person->firstname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('px'))
                            <div class="text-danger">
                                {{ $errors->first('px') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nurse</label>
                        <select class="form-control select2-single" name="nid">
                            @forelse ($nons as $n)
                                <option value="{{ $n->nid }}">{{ $n->nurse->worker->person->firstname }}
                                    {{ $n->nurse->worker->person->middlename }}
                                    {{ $n->nurse->worker->person->lastname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('nid'))
                            <div class="text-danger">
                                {{ $errors->first('nid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select class="form-control select2-single" name="shiftid">
                            @forelse ($nons as $d)
                                <option value="{{ $d->shiftid }}">{{ $d->shift->from }} - {{ $d->shift->to }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('shiftid'))
                            <div class="text-danger">
                                {{ $errors->first('shiftid') }}
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
