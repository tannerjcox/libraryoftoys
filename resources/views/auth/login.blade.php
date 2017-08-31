@extends('layouts.app')
@section('title')
    User Login
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">Login</div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="{{ $errors->has('email') ? 'has-error' : '' }} col m6 input-field s12">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="{{ $errors->has('password') ? 'has-error' : '' }} col m6 input-field s12">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m6 offset-m4 input-field">
                                    <div class="checkbox">
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12">
                                    <div class="center-align">
                                        <button onclick="$('form').submit()" class="btn btn-primary waves-effect waves-light">
                                            Login
                                        </button>
                                        <a class="btn btn-flat" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
