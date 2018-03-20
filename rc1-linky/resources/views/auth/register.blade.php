@extends('layouts.master')

@section('content')
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a ><b>RC1</b> - Linky</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Créer un compte</p>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{--<label for="name" class="col-md-1 control-label">NOM</label>--}}

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-1 control-label">E-Mail Adresse</label>--}}

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{--<label for="password" class="col-md-6 control-label">Mot de passe</label>--}}

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

                        <div class="form-group has-feedback">
                            {{--<label for="password-confirm" class="col-md-12 control-label">Confirmer mot de passe</label>--}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer mot de passe" required>
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" required> J'adhère aux  <a href="#">termes</a>
                                    </label>
                                </div>
                                <script>
                                    $(function () {
                                        $('input').iCheck({
                                            checkboxClass: 'icheckbox_square-blue',
                                            radioClass: 'iradio_square-blue',
                                            increaseArea: '20%' /* optional */
                                        });
                                    });
                                    </script>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-5">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Enregistrer</button>
                            </div>
                            <!-- /.col -->
                        </div>

                        {{--<div class="social-auth-links text-center">--}}
                            {{--<p>- OR -</p>--}}
                            {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Me connecter avec--}}
                                {{--Facebook</a>--}}
                            {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Me connecter avec--}}
                                {{--Google+</a>--}}
                        {{--</div>--}}
                        <a class="btn btn-link" href="{{ route('login') }}">J'ai déja un compte</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
