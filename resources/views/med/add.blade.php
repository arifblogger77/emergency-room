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
                Add New
            </div>
            <div class="card-body">
                <a href="{{ route('med') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('med.new') }}">

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
                            @forelse ($doctor as $d)
                                <option value="{{ $d->did }}">{{ $d->worker->person->firstname }}
                                    {{ $d->worker->person->middlename }}
                                    {{ $d->worker->person->lastname }}
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
                        <label>Medication</label>

                        <select class="form-control select2-single" name="medication_id">
                            @forelse ($medication as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('medication_id'))
                            <div class="text-danger">
                                {{ $errors->first('medication_id') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Dosage</label>
                        <input type="number" name="dosage" class="form-control" placeholder="Dosage">

                        @if ($errors->has('dosage'))
                            <div class="text-danger">
                                {{ $errors->first('dosage') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Med from</label>
                        <input type="date" name="medfrom" class="form-control" placeholder="Date from">

                        @if ($errors->has('medfrom'))
                            <div class="text-danger">
                                {{ $errors->first('medfrom') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Med to</label>
                        <input type="date" name="medto" class="form-control" placeholder="Date to">

                        @if ($errors->has('medto'))
                            <div class="text-danger">
                                {{ $errors->first('medto') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>How often</label>
                        <input type="number" name="howoften" class="form-control" placeholder="How often">

                        @if ($errors->has('howoften'))
                            <div class="text-danger">
                                {{ $errors->first('howoften') }}
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
