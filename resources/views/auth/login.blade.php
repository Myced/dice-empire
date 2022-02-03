@extends('layouts.auth')

@section('title')
    {{ "Login" }}
@endsection

@section('content')
<div class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">
                <strong>DICE EMPIRE</strong>
            </a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
    
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line @error('email') {{ 'error' }} @enderror">
                            <input type="email" class="form-control" name="email" 
                                placeholder="Email Address" required autofocus
                                value="{{ old('email') }}">
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
                        <div class="form-line @error('password') {{ 'error' }} @enderror">
                            <input type="password" class="form-control" name="password" 
                                placeholder="Password" required>
                        </div>
                        @error('password')
                            <label class="error" role="alert">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        $('#sign_in').validate({
            highlight: function (input) {
                console.log(input);
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
            }
        });
    });
</script>
@endsection
