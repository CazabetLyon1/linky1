@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
            @include('navbar.navbarHeader')
            @include('navbar.navbarSidebar',['page'=>'accueil'])
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Menu
                        <small>Récapitulatif</small>
                    </h1>

                    <section class="content">
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua" style="height: 32vh">
                                    <div class="inner">
                                        <h3> {{ $moy7 }}</h3>

                                        <p>Consommation moyenne des 7 derniers jours</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green" style="height: 32vh">
                                    <div class="inner">
                                        <h3> {{ $moyPrev }}</h3>

                                        <p>Consommation moyenne de la veille</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6 vignette">
                                <!-- small box -->
                                <div class="small-box bg-yellow" style="height: 32vh">
                                    <div class="inner">
                                        <h3>{{ $maxPrev }}</h3>

                                        <p>Consommation maximale de la veille </p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6 h-75 " >
                                <!-- small box -->
                                <div class="small-box bg-red" style="height: 32vh">
                                    <div class="inner">
                                        <h3>{{ $estimateCost }}</h3>

                                        <p>Coût estimé pour le mois</p>
                                        <row></row>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                    </section>
            </div>
        </body>
    </div>
@endsection
@section('script')

@endsection
