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

                            <h6 class="card-title">Add Admin</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('update.admin',$user->id) }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Admin Username</label>
                                    <input type="text" class="form-control"  name="username" value="{{ $user->username }}">
                                </div>
                                 <div class="form-group mb-3">
                                    <label for="name" class="form-label">Admin Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{ $user->name }}">
                                </div>
                                 <div class="form-group mb-3">
                                    <label for="email" class="form-label">Admin email</label>
                                    <input type="email" class="form-control"  name="email" value="{{ $user->email }}">
                                </div>
                                 <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Admin Phone</label>
                                    <input type="text" class="form-control"  name="phone"value="{{ $user->phone }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Admin Address</label>
                                    <input type="text" class="form-control"  name="address"value="{{ $user->address }}">
                                </div>  
                                <div class="form-group mb-3">
                                    <label for="role_id" class="form-label">Roles Name</label>
                                    <select name="role" class="form-select" id="form-select-1">
                                        <option selected disabled>Select Group</option>
                                        @foreach ($Roles as $role)
                                            <option value="{{ $role->id }}"{{ $user->hasRole($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach

                                    </select>   
                                </div>
                                     
                                
                                <button type="submit" class="btn btn-primary me-2">Add Admin</button>
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
                    email: {
                        required: true,
                    },
                    
                    username: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    
                    password: {
                        required: true,
                    },
                    
                    address: {
                        required: true,
                    },
                },
                messages: {
                   name: {
                        required: "Enter your name",
                    },
                    email: {
                        required: "Enter your email",
                    },
                    username: {
                        required: "Enter your usename",
                    }
                    ,
                    phone: {
                        required: "Enter your phone",
                    }
                    ,
                    password: {
                        required: "Enter your password",
                    }
                    ,
                    address: {
                        required: "Enter your address",
                    }

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
