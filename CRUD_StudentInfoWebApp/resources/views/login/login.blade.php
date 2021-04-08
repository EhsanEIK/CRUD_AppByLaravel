@extends('login.login_layout')
@section('title', 'Login')
@section('content')
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-2">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Don't have an account?
                            <a href="{{ route('register') }} " class="btn btn-info">Click Here</a>
                        </h3>
                        {!! Form::open(['route'=> 'login.confirm', 'method'=>'POST', 'class'=>'login-form']) !!}
                            <div class="form-group">
                                {{Form::text('email',NULL, ['class'=>'form-control rounded-left', 'id'=>'email', 'placeholder'=>'E-mail', 'required'])}}
                            </div>
                            <div class="form-group d-flex">
                                {{Form::password('password', ['class'=>'form-control rounded-left', 'id'=>'password', 'placeholder'=>'Password', 'required'])}}
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary rounded">Log In</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
