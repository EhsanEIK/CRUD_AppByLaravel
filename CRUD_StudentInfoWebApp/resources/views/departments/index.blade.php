@extends('layout.main')
@section('title', 'Department | Index')
@section('content')

    <div>
        <center>
            <h3 class="jumbotron jumbotron-fluid">Department List</h3>
        </center>
    </div>
    <a href="{{ url('dashboard') }}" class="btn btn-info">Home</a>
    <a href="{{ route('departments.create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
    <table class="table table-hover mt-3">
        <thead>
        <tr>
            <th>SL No.</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach ( $departments as $key => $department )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <form action="{{ route('departments.destroy', ['department'=>$department->id]) }}" method="POST">
                            <a href="{{ route('departments.show', ['department'=>$department->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('departments.edit', ['department'=>$department->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
    