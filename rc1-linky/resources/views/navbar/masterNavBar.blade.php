

@extends('layouts.master')

@section('Content')
    <body class="hold-transition skin-blue sidebar-mini">
    @yield('main-header')
    @yield('main-sidebar')

    {{-- yeild content more--}}

    @component('childs.alert')
        @slot('title')
            Forbidden
        @endslot

        You are not allowed to access this resource!
    @endcomponent
    </body>

@endsection