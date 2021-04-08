@extends('layout.main')
@section('title', 'Student | Index')
@section('content')

    <div>
        <center>
            <h3 class="jumbotron jumbotron-fluid">Student List</h3>
        </center>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('dashboard') }}" class="btn btn-info">Home</a>
            <a href="{{ route('students.create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('students.pdf') }}" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Generate PDF</a>
        </div>
    </div>
    
    <table class="table table-hover mt-3">
        <thead>
        <tr>
            <th>SL No.</th>
            <th>Department</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
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
                    <td>
                        <form action="{{ route('students.destroy', ['student'=>$student->id]) }}" method="POST">
                            <a href="{{ route('students.show', ['student'=>$student->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('students.edit', ['student'=>$student->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are You Sure?');" type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
    