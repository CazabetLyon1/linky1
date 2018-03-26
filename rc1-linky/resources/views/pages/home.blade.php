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

                        <!---****************************** Vignettes ****************************-->
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



                        <!--****************************** Graph ****************************-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-left header">Ma consommation</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; max-height: 600px">
                                    <style>
                                        canvas {
                                            -moz-user-select: none;
                                            -webkit-user-select: none;
                                            -ms-user-select: none;
                                        }
                                    </style>
                                    <div class="chart">
                                        <div id="Graph_1" style="min-width: 310px; height: 100%; max-width: 100%; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
            </div>
        </body>
    </div>
@endsection
@section('script')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>

    <script>
        function getDayOfWeek(date) {
            var dayOfWeek = new Date(date).getDay();
            return isNaN(dayOfWeek) ? null : ['0', '1', '2', '3', '4', '5', '6'][dayOfWeek];
        }

        var PrevVals = [];
        var TypeVals = [];
        var graphMoy7Prev = {!! $graphMoy7Prev !!};
        var GraphType = {!! $GraphType !!};
        for(var it in graphMoy7Prev)
        {
            PrevVals.push([getDayOfWeek(graphMoy7Prev[it].m_date), graphMoy7Prev[it].m_value]);
        }
        for(var it in GraphType )
        {
            TypeVals.push([GraphType[it].m_day, GraphType[it].m_value]);
        }
        console.log(TypeVals);

        Highcharts.chart('Graph_1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Suivi de Consommation'
            },
            xAxis: {
                categories: [
                        'Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi','Dimanche'
                ]
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'kw/h'
                }
            },
            {
                title: {
                    text: 'Consommation / jours'
                },
                opposite: true
            }],
            legend: {
                shadow: false
            },
            tooltip: {
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: false,
                    shadow: false,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Consommation Type',
                color: 'rgba(165,170,217,1)',
                data: TypeVals,
                pointPadding: 0.3,
            }, {
                name: 'Consommation des derniers jours',
                color: 'rgba(126,86,134,.9)',
                data: PrevVals,
                pointPadding: 0.4,
            }]
        });
    </script>

@endsection
