<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student | PDF</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-6 mt-3">
            <h4>Lorem Ipsum university</h>
        </div>
        <div class="col-md-6 text-right">
            <img src="{{ public_path('projectFiles/logo.jpg') }}" height="70px" width="70px">
        </div>
    </div>
    <center>
        <h5>Student List</h5>
    </center>
    
    <table class="table table-hover mt-4">
        <thead>
        <tr>
            <th>SL No.</th>
            <th>Department</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach ( $students as $key => $student)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ optional($student->Department)->name }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->roll }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
    