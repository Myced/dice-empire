@extends('layouts.auth')

@section('title')
    {{ "Register" }}
@endsection

@section('content')
<div class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">
                <strong>DICE EMPIRE</strong>
            </a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="msg">Register a new membership</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Full Name" 
                                required autofocus value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <label class="error" role="alert">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" 
                            required value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <label class="error" role="alert">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="3" 
                                placeholder="Password at least 6 characters" required>
                        </div>
                        @error('password')
                            <label class="error" role="alert">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="3" 
                                placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
    
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
    
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route('login') }}">You already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
