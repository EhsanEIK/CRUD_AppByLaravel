@extends('login.login_layout')
@section('title', 'Login')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-2">
                    <h2 class="heading-section">Register</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        {!! Form::open(['route'=> 'register.store', 'method'=>'POST', 'class'=>'login-form']) !!}
                            <div class="form-group">
                                {{Form::text('name',NULL, ['class'=>'form-control rounded-left', 'id'=>'name', 'placeholder'=>'Name', 'required'])}}
                            </div>
                            <div class="form-group">
                                {{Form::text('email',NULL, ['class'=>'form-control rounded-left', 'id'=>'email', 'placeholder'=>'E-mail', 'required'])}}
                            </div>
                            <div class="form-group d-flex">
                                {{Form::password('password', ['class'=>'form-control rounded-left', 'id'=>'password', 'placeholder'=>'Password', 'required'])}}
                            </div>
                            <div class="form-group text-center mt-3">
                                <button type="submit" class="btn btn-primary rounded">Register</button>
                            </div>
                            <div class="form-group text-center">
                                <a href="{{ route('login') }}">Back</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
