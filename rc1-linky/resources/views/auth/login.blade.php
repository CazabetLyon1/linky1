@extends('layouts.master')

@section('title', 'Login')


@section('content')
<body class="hold-transition login-page">
    <!-- Title -->
    <div class="login-box">
        <div class="login-logo">
            <a><b>RC1</b> - Linky</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Enregistrez vous avant de continuer.</p>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                     {{--<label for="email" class="col-md-4 control-label">Adresse E-Mail</label>--}}

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                     {{--<label for="password" class="col-md-4 control-label">Mot de passe</label>--}}

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Connection
                        </button>
                   </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
            </div>
             <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié</a>
             <a class="btn btn-link" href="{{ route('register') }}">Créer un compte</a>

        </div>
    </div>
</body>

@endsection
