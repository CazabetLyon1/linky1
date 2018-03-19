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
                        Menu
                        <small>Que voulez vous faire ?</small>
                    </h1>
                </section>
            </div>
        </body>
    </div>
@endsection
@section('script')

@endsection
