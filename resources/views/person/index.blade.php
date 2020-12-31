<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Person
            </div>
            <div class="card-body">
                <a href="/person/add" class="btn btn-primary">Input New Person</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($person as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->lastname }}</td>
                                <td>{{ $p->firstname }}</td>
                                <td>{{ $p->middlename }}</td>
                                <td>
                                    <a href="/person/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/person/delete/{{ $p->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
