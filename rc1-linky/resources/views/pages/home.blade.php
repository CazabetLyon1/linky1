@extends('layouts.master')

@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
@section('script')

@endsection
