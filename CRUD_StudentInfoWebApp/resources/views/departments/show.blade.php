@extends('layout.main')
@section('title', 'Department | Show')
@section('content')

    <center>
        <h3 class="jumbotron jumbotron-fluid"><strong>{{ $department->name }} </strong>Information</h3>
    </center>
        <a href="{{ route('departments.index') }}" class="btn btn-info"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
    <center>    
        <table>
            <tr>
                <th>Name:</th>
                <td>
                    {{ $department->name }}
                </td>
            </tr>
            <tr>
                <th>Location:</th>
                <td>
                    {{ $department->location }}
                </td>
            </tr>
        </table>
    </center>

@endsection