@extends('layouts.app')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2-single').select2({
                theme: 'bootstrap4',
            });
        });

        $(function() {
            $('#from').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            $('#to').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false //Important! See issue #1075
            });
            $("#from").on("dp.change", function(e) {
                $('#to').data("DateTimePicker").minDate(e.date);
            });
            $("#to").on("dp.change", function(e) {
                $('#from').data("DateTimePicker").maxDate(e.date);
            });
        });

    </script>
@endpush

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Beda
            </div>
            <div class="card-body">
                <a href="{{ route('adm') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('adm.new') }}">

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
                        <label>Receptionist</label>
                        <select class="form-control select2-single" name="rid">
                            @forelse ($receptionist as $r)
                                <option value="{{ $r->rid }}">{{ $r->worker->person->firstname }}
                                    {{ $r->worker->person->middlename }}
                                    {{ $r->worker->person->lastname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('rid'))
                            <div class="text-danger">
                                {{ $errors->first('rid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select class="form-control select2-single" name="shiftid">
                            @forelse ($shift as $s)
                                <option value="{{ $s->shiftid }}">{{ $s->from }} {{ $s->to }}
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
                        <label>Admission</label>
                        <input type="text" name="admission" class="form-control" id="to"
                            placeholder="Year-month-date Hour:minute:second">

                        @if ($errors->has('admission'))
                            <div class="text-danger">
                                {{ $errors->first('admission') }}
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
