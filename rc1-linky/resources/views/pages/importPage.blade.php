@extends('layouts.master')

@section('content')
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Quick Example</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="file_upload">Selectionner un fichier</label>
                                        <input type="file" id="file_upload" name="file_upload" accept=".csv">

                                        <p class="help-block">Le fichier selectionner sera upload sur nos serveur et restera confidentiel. </p>
                                    </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    public function store(Request $request)
    {
    $request->logo->store('logos');
    }


            <!-- /.box -->
    </body>


@endsection
@section('script')

@endsection
