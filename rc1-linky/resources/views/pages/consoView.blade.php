@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'consoView'])

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ma consommation
                    </h1>
                </section>


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
                                    <div id="container" style="min-width: 310px; height: 100%; max-width: 100%; margin: 0 auto"></div>
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
    <script src="bowser_components/Highcharts/code/higcharts.js"></script>
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        var lab = [];
        var val = [];
        var data = {!! $data1 !!};
        for(var it in data)
        {
            val.push([new Date(data[it].horodate), data[it].value]);
        }
        console.log(val);

        Highcharts.stockChart('container', {


            rangeSelector: {
                selected: 1
            },

            title: {
                text: 'AAPL Stock Price'
            },
            xAxis: {
                type: 'datetime'
            },

            series: [{
                name: 'AAPL',
                data: val,
                tooltip: {
                    valueDecimals: 2
                }
            }]
        });

    </script>
    <!--
    <script src="../node_modules/chart.js/dist/Chart.bundle.js"></script>
    <script src="bower_components/hammerJs/hammer.min.js"></script>
    <script src="bower_components/chart.js/plugin/chartzoom.js"></script>
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
                    label: "Consommation en kw",
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
                    display: false,
                    text: 'Ma consommation électrique'
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
                }
            }
        });


    </script>-->
@endsection
