@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'parameters'])
            <div class="content-wrapper" >

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="nav-tabs-custom" >
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="pull-left header">Paramètres</li>
                                    </ul>
                                    <div class="maj">
                                        @if(session('success'))
                                            <h1>{{session('success')}}</h1>
                                        @endif
                                    </div>
                                    <div class="container">
                                        <form action="{{ route('validation') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="fname">Prénom</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="text" id="prenom" name="prenom" placeholder="Votre prénom" value="{{ Auth::user()->prenom }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="lname">Nom</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="text" id="name" name="name" placeholder="Votre nom" value="{{ Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="lenedis">Login Enedis</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="text" id="login" name="login" placeholder="Votre login Enedis" value="{{ Auth::user()->login_linky }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="penedis">Mot de passe Enedis</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="text" id="pswd" name="pswd" placeholder="Votre mot de passe Enedis" value="{{ Auth::user()->mdp_linky }}">
                                                    </div>
                                                </div>
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-12">--}}
                                                        {{--<label for="ville">Ville</label>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-md-12">--}}
                                                        {{--<input class="col-md-6" type="text" id="ville" name="Ville" placeholder="Entrez le nom de votre ville" value="{{ Auth::user()->ville }}">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="logement">Logement</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="radio" name="logement" value="appartement"> Appartement<br>
                                                        <input type="radio" name="logement" value="maison"> Maison
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="ville">Superficie</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="number" id="superficie" name="superficie" placeholder="Entrez votre superficie" value="{{ Auth::user()->superficie }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="Habitants">Habitants</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input class="col-md-6" type="number" id="habitants" name="habitants" placeholder="Habitants du foyer" value="{{ Auth::user()->habitants }}">
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    En validant vous acceptez que nous relevions vos données toutes les 30 minutes
                                                </div>
                                                <div class="row">
                                                    <input type="submit" value="Submit">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </body>
    </div>

<style>
    input[type=text], select {
    width: 75%;
    padding: 8px 13px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=number], select {
        width: 75%;
        padding: 8px 13px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .maj {
        font-size: 32px;
        text-shadow: -1px -1px #3646cc, 1px 1px rgba(140, 187, 255, 0.46), -3px 0 4px #ffffff;
        font-family:Arial, Helvetica, sans-serif;
        color: #537cac;
        padding:16px;
        font-weight:lighter;
        -moz-box-shadow: 2px 2px 6px #888;
        -webkit-box-shadow: 2px 2px 6px #888;
        box-shadow:2px 2px 6px #888;
        text-align:center;
        display:block;
        margin:16px;
    }

</style>

@endsection
@section('script')

@endsection
