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

                            <h6 class="card-title">Add Permission</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('store.Permission') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control"  name="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="group_name" class="form-label">Group Name</label>
                                    <select name="group_name" class="form-select" id="form-select-1">
                                        <option selected disabled>Select Group</option>
                                        <option value="Property_type">Property Type</option>
                                        <option value="Amenities">Amenities</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Add Permission</button>
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
                    name: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter the Permission name',
                    },
                    group_name: {
                        required: 'Please Select the group_name',
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
