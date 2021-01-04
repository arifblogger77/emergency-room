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
                        <label>Patient id</label>
                        <input type="text" name="pid" class="form-control" placeholder="Patient id">

                        @if ($errors->has('pid'))
                            <div class="text-danger">
                                {{ $errors->first('pid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Doctor id</label>
                        <input type="text" name="did" class="form-control" placeholder="Doctor id">

                        @if ($errors->has('did'))
                            <div class="text-danger">
                                {{ $errors->first('did') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Medication</label>

                        <select class="form-control select2-single" name="med">
                            @forelse ($medication as $m)
                                <option value="{{ $m->name }}">{{ $m->name }}</option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('med'))
                            <div class="text-danger">
                                {{ $errors->first('med') }}
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
                        <input type="Y-m-d" name="medfrom" class="form-control" placeholder="Date from">

                        @if ($errors->has('medfrom'))
                            <div class="text-danger">
                                {{ $errors->first('medfrom') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Med to</label>
                        <input type="Y-m-d" name="medto" class="form-control" placeholder="Date to">

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
