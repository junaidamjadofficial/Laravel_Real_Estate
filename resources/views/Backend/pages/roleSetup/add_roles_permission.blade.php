@extends('Admin.Admin_Dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .form-check-label{
            text-transform: capitalize
        }
    </style>
    <div class="page-content">
        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Roles in Permission</h6>

                            <form id="myForm" class="forms-sample" method="POST" action="{{ route('roles.permission.store') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="role_id" class="form-label">Roles Name</label>
                                    <select name="role_id" class="form-select" id="form-select-1">
                                        <option selected disabled>Select Group</option>
                                        @foreach ($Roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultedmain">
                                    <label class="form-check-label" for="checkDefaultedmain">
                                        All Permission
                                    </label>
                                </div>
                                <hr>
                                <div class="row">
                                    @foreach ($permission_groups as $group)
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkChecked">
                                                <label class="form-check-label" for="checkChecked">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @php
                                        $permissions=App\Models\User::getpermissionByName($group->group_name)
                                        @endphp
                                           <div class="col-9">
                                               @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="permission[]" class="form-check-input"
                                                    id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}">
                                                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>                                            

                                    @endforeach
                                    
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Set</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
        $('#checkDefaultedmain').click(function(){
            if($(this).is(':checked')){
                $('input[ type= checkbox]').prop('checked',true);
            }else{
                $('input[ type= checkbox]').prop('checked',false);
            }
        });
    </script>
@endsection
