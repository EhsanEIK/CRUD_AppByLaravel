@extends('layout.main')
@section('title', 'Student Web App')
@section('content')

    <center class="mt-5">
        <h3>
            <a href="{{ route('students.index') }}">Students</a>
        </h3>
        <h3>
            <a href="{{ route('departments.index') }}">Departments</a>
        </h3>

        <h5>
            <a href="{{ route('logout') }}" class="btn btn-danger">Log Out</a>
        </h5>
    </center>
@endsection