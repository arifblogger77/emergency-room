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
                Edit beda
            </div>
            <div class="card-body">
                <a href="{{ route('beda') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('beda.update', ['id' => $beda->pid]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Patient</label>
                        <select class="form-control select2-single" name="pid">
                            @forelse ($patient as $p)
                                <option value="{{ $p->pid }}" {{ $p->pid == $beda->pid ? 'selected' : '' }}>
                                    {{ $p->person->firstname }} {{ $p->person->middlename }}
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
                        <label>Bed number</label>
                        <select class="form-control select2-single" name="bedno" type="text">
                            @forelse ($bed as $b)
                                <option value="{{ $b->number }}" {{ $b->number == $beda->bedno ? 'selected' : '' }}>
                                    {{ $b->number }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('bedno'))
                            <div class="text-danger">
                                {{ $errors->first('bedno') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>From</label>
                        <input type="text" name="from" class="form-control" id="from"
                            placeholder="Year-month-date Hour:minute:second" value="{{ $beda->from }}">

                        @if ($errors->has('from'))
                            <div class="text-danger">
                                {{ $errors->first('from') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>To</label>
                        <input type="text" name="to" class="form-control" id="to"
                            placeholder="Year-month-date Hour:minute:second" value="{{ $beda->to }}">

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
