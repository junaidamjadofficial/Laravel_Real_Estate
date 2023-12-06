@extends('Admin.Admin_Dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-primary  btn-icon-text mb-2 mb-md-0 ms-2" href="{{ route('export') }}">
                    <i class="btn-icon-prepend" data-feather="Download-cloud"></i>Download XLsx</a>
            </ol>
        </nav>
        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Import Permission</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">XLSX Import File </label>
                                    <input type="file" class="form-control"  name="import_file">
                                </div>
                               
                                <button type="submit" class="btn btn-primary me-2">Upload</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    
@endsection
