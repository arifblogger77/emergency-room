<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>ADD NEW PERSON</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Person
            </div>
            <div class="card-body">
                <a href="/person" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="/person/update/{{ $person->id }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last name"
                            value=" {{ $person->lastname }}">

                        @if ($errors->has('lastname'))
                            <div class="text-danger">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First name"
                            value=" {{ $person->firstname }}">

                        @if ($errors->has('firstname'))
                            <div class="text-danger">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middlename" class="form-control" placeholder="Middle name"
                            value=" {{ $person->middlename }}">

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>
