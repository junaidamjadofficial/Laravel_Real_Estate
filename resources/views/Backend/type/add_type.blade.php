@extends('Admin.Admin_Dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
           
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Property Type</h6>

                            <form class="forms-sample" method="POST" action="{{ route('store.type') }}">
                                @csrf
                              
                                <div class="mb-3">
                                    <label for="type_name" class="form-label">Type Name</label>
                                    <input type="text"
                                        class="form-control @error('type_name')
                                            is-invalid
                                        @enderror"
                                        id="type_name" name="type_name">
                                    @error('type_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type_icon" class="form-label">Type Icon</label>
                                    <input type="text"
                                        class="form-control @error('type_icon')
                                            is-invalid
                                        @enderror"
                                        id="type_icon" name="type_icon">
                                    @error('type_icon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Add Property type</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
