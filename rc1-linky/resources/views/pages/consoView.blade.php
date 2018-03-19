@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar')

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Importer
                        <small>Importer un fichier</small>
                    </h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Consomation moyenne</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Consomation verte</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">Plus d'informations<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Points a ameliorer</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">Plus d'informations<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Consomation maximale</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">Plus d'information <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>


                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
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
                                <canvas id="canvas" style="max-height:600px"></canvas>
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

    <script src="../node_modules/chart.js/dist/Chart.bundle.js"></script>
    <script src="bower_components/hammerJs/hammer.min.js"></script>
    <script src="bower_components/chart.js/plugin/chartzoom.js"></script>
    <!-- page script -->
    <script>
        var timeFormat = 'MM/DD/YYYY HH:mm';
        var lab = [];
        var val = [];
        var data = {!! $data1 !!};
        for(var it in data)
        {
            lab.push(data[it].horodate);
            val.push(data[it].value);
        }
        new Chart(document.getElementById("canvas"), {
            type: 'line',
            data: {
                labels: lab,
                datasets: [{
                    data: val,
                    label: "Africa",
                    borderColor: "#3e95cd",
                    fill: false
                }
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                },
                pan: {
                    enabled: true,
                    mode: 'xy',
                    speed: 10,
                    threshold: 10
                },
                zoom: {
                    enabled: true,
                    mode: 'xy'
                },
            }
        });


    </script>
@endsection
