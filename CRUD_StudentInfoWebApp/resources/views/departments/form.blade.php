@extends('layout.main')
@section('title', 'Department | Create')
@section('content')
    
    <div>
        <center>
            <h3 class="jumbotron jumbotron-fluid">{{ $headline }}</h3>
        </center>
    </div>
    <a href="{{ route('departments.index') }}" class="btn btn-info"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>

    @if($mode == 'edit')
        {!! Form::model( $department, ['route' => ['departments.update', $department->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

    @else
        {!! Form::open(['route'=> 'departments.store', 'method'=>'POST']) !!}

    @endif
        
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label text-right">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {{Form::text('name',NULL, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name', 'required'])}}
            </div>
        </div>

        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label text-right">Location </label>
            <div class="col-sm-10">
                {{Form::textarea('location',NULL, ['class'=>'form-control', 'rows'=>'4', 'id'=>'location', 'placeholder'=>'Location'])}}
            </div>
        </div>

        <div class="form-group row">
            <label  class="col-sm-2 col-form-label text-right"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">{{ $button }}</button>
            </div>
        </div>

    {!! Form::close() !!}

@endsection