@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'importPage'])
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Importer
                        <small>Importer un fichier</small>
                    </h1>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Importer votre fichier de consommation</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="file_upload">Selectionner un fichier</label>
                                                <input type="file" id="file_upload" name="file_upload" accept=".csv">

                                                <p class="help-block">Le fichier selectionner sera stocké sur nos serveur et restera strictement confidentiel. </p>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </form>
                                    </div>
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

@endsection
