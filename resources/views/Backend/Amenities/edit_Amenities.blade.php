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

                            <h6 class="card-title">Add Amenities</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('update.Amenitie') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $Amenitite->id }}">
                                <div class="form-group mb-3">
                                    <label for="amenities_name" class="form-label">Amenitie Name</label>
                                    <input type="text" class="form-control"  name="amenities_name" value="{{ $Amenitite->amenities_name }}">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    amenities_name: {
                        required: true,
                    },

                },
                messages: {
                    amenities_name: {
                        required: 'Please Enter Amenities Name',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
