@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'parametre'])
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Paramètres
                        <small>Personnalisez votre compte</small>
                    </h1>
                </section>
            </div>
        <div class="container">
            <form action="action_page.php">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Prénom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="prenom" name="prenom" placeholder="Votre prénom">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Nom</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nom" name="nom" placeholder="Votre nom">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ville">Ville</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="ville" name="Ville" placeholder="Entrez le nom de votre ville">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="logement">Logement</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" id="logement" name="logement" value="Maison" checked> Maison<br>
                        <input type="radio" id="logement" name="Logement" value="Appartement"> Appartement<br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="ville">Superficie</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="superficie" name="superficie" placeholder="Entrez votre superficie">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Habitants">Habitants</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="habitants" name="habitants" placeholder="Habitants du foyer">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
        </body>
    </div>


@endsection
@section('script')

@endsection
