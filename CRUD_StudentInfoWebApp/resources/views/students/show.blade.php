@extends('layout.main')
@section('title', 'Student | Show')
@section('content')

    <center>
        <h3 class="jumbotron jumbotron-fluid"><strong>{{ $student->name }} </strong>Information</h3>
    </center>
        <a href="{{ route('students.index') }}" class="btn btn-info"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
    <center>    
        <table>
            <tr>
                <th>Name:</th>
                <td>
                    {{ $student->name }}
                </td>
            </tr>
            <tr>
                <th>Dept:</th>
                <td>
                    {{ $student->Department->name }}
                </td>
            </tr>
            <tr>
                <th>Roll:</th>
                <td>
                    {{ $student->roll }}
                </td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td>
                    {{ $student->email }}
                </td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td>
                    {{ $student->phone }}
                </td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>
                    {{ $student->address }}
                </td>
            </tr>
            <tr>
                <th>Image:</th>
            </tr>
            <tr>
                <td></td>
                <td>
                    <img src="{{ $url }}" alt="" style="max-width: 350px; ">
                </td>
            </tr>
        </table>
        
    </center>

@endsection