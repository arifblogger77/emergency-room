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
                Add Worker
            </div>
            <div class="card-body">
                <a href="{{ route('status') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('worker.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="nurse">Nurse</option>
                            <option value="doctor">Doctor</option>
                            <option value="receptionist">Receptionist</option>
                        </select>

                        @if ($errors->has('status'))
                            <div class="text-danger">
                                {{ $errors->first('status') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Person</label>
                        <select class="form-control select2-single" name="wid">
                            @forelse ($person as $p)
                                <option value="{{ $p->id }}">{{ $p->firstname }} {{ $p->middlename }} {{ $p->lastname }}
                                </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                        @if ($errors->has('wid'))
                            <div class="text-danger">
                                {{ $errors->first('wid') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select class="form-control select2-single" name="shift">
                            @forelse ($shift as $s)
                                <option value="{{ $s->shiftid }}">{{ $s->from }} - {{ $s->to }}
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
