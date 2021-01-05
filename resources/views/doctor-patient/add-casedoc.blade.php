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
                Add New Casedoc
            </div>
            <div class="card-body">
                <a href="{{ route('doctor-patient') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('casedoc.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Patient</label>
                        <select class="form-control select2-single" name="pid">
                            @forelse ($patient as $p)
                                <option value="{{ $p->pid }}">{{ $p->person->firstname }} {{ $p->person->middlename }}
                                    {{ $p->person->lastname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('pid'))
                            <div class="text-danger">
                                {{ $errors->first('pid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Doctor</label>
                        <select class="form-control select2-single" name="did">
                            @forelse ($dons as $d)
                                <option value="{{ $d->did }}">{{ $d->doctor->worker->person->firstname }}
                                    {{ $d->doctor->worker->person->middlename }}
                                    {{ $d->doctor->worker->person->lastname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('did'))
                            <div class="text-danger">
                                {{ $errors->first('did') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select class="form-control select2-single" name="shiftid">
                            @forelse ($dons as $s)
                                <option value="{{ $s->shiftid }}">{{ $s->shift->from }} - {{ $s->shift->to }}
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
