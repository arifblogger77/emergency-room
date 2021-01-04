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
                Add Patient
            </div>
            <div class="card-body">
                <a href="{{ route('status') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('patient.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Person</label>
                        <select class="form-control select2-single" name="pid">
                            @forelse ($person as $p)
                                <option value="{{ $p->id }}">{{ $p->firstname }} {{ $p->middlename }} {{ $p->lastname }}
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
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
