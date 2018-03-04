@extends('layouts.master')

@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
    @include('navbar.navbarHeader')
    @include('navbar.navbarSidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Area Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="canvas" style="height:250px"></canvas>
                        </div>
                    </div>
                    <button id="a"> ddd</button>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
    </body>


@endsection
@section('script')


    <!-- page script -->
    <script>
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
                title: {
                    display: true,
                    text: 'World population per region (in millions)'
                }
            }
        });


    </script>
@endsection
