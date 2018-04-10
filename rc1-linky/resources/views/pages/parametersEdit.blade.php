@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'parameters'])
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="nav-tabs-custom" >
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="pull-left header">Paramètres</li>
                                </ul>
                                <div class="container">
                                    <form action="action_page.php">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="fname">Prénom</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="text" id="prenom" name="prenom" placeholder="Votre prénom">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="lname">Nom</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="text" id="nom" name="nom" placeholder="Votre nom">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="lenedis">Login Enedis</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="text" id="login" name="login" placeholder="Votre login Enedis">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="penedis">Mot de passe Enedis</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="text" id="pswd" name="pswd" placeholder="Votre mot de passe Enedis">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="ville">Ville</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="text" id="ville" name="Ville" placeholder="Entrez le nom de votre ville">
                                                </div>
                                            </div>
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
                                                    <input class="col-md-6" type="number" id="superficie" name="superficie" placeholder="Entrez votre superficie">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="Habitants">Habitants</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="col-md-6" type="number" id="habitants" name="habitants" placeholder="Habitants du foyer">
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


</style>

@endsection
@section('script')

@endsection
