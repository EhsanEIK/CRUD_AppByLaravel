@extends('layout.main')
@section('title', 'Student | Create')
@section('content')
    
    <div>
        <center>
            <h3 class="jumbotron jumbotron-fluid">{{ $headline }}</h3>
        </center>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-info"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>

    @if($mode == 'edit')
        {!! Form::model( $student, ['route' => ['students.update', $student->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

    @else
        {!! Form::open(['route'=> 'students.store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

    @endif
        
        <div class="form-group row">
            <label for="department_id" class="col-sm-2 col-form-label text-right">Department <span class="text-danger">*</span></label>
            <div class="col-sm-10">
            {{ Form::select('department_id', $departments , NULL, 
            ['class'=>'form-control', 'id'=>'department_id', 'placeholder'=>'SELECT']) }}
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label text-right">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {{Form::text('name',NULL, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name', 'required'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="roll" class="col-sm-2 col-form-label text-right">Roll <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {{Form::text('roll',NULL, ['class'=>'form-control', 'id'=>'roll', 'placeholder'=>'Roll', 'required'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-right">E-mail <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {{Form::text('email',NULL, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'E-mail', 'required'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label text-right">Phone </label>
            <div class="col-sm-10">
                {{Form::text('phone',NULL, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label text-right">Address </label>
            <div class="col-sm-10">
                {{Form::textarea('address',NULL, ['class'=>'form-control', 'rows'=>'4', 'id'=>'address', 'placeholder'=>'Address'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="imgPath" class="col-sm-2 col-form-label text-right">Image </label>
            <div class="col-sm-10">
                {{Form::file('imgPath',NULL, ['class'=>'form-control', 'id'=>'imgPath'])}}
            </div>
        </div>

        @if ($mode == 'edit')
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label text-right">Present Image</label>
                <div class="col-sm-10">
                    <img src="{{ $url }}" alt="" style="max-width: 350px; ">
                </div>
            </div>
        @endif

        <div class="form-group row">
            <label  class="col-sm-2 col-form-label text-right"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ $button }}</button>
            </div>
        </div>

    {!! Form::close() !!}

@endsection