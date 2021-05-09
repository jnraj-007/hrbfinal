@extends('frontend.app')
@section('area')

    @include('frontend.partials.loginRegistration.header')

    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Dashboard</h1>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif
                                <form method="post" class="form-validate" action="{{route('frontend.do.login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login-username" class="label-material">User email</label>
                                        <input id="login-username" type="email" name="email" required data-msg="Please enter your email" class="input-material">
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password" class="label-material">Password</label>
                                        <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Login</button>
                                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                                </form>
                                    <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


    @include('frontend.partials.loginRegistration.footer')
@endsection
