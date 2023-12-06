@extends('Admin.Admin_Dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-inverse-info" href="{{ route('add.roles.permission') }}">Add Role in Permission</a>
                {{-- <a class="btn btn-primary  btn-icon-text mb-2 mb-md-0 ms-2" href="{{ route('import.Roles') }}">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>Import</a>
                <a class="btn btn-primary  btn-icon-text mb-2 mb-md-0 ms-2" href="{{ route('export') }}">
                    <i class="btn-icon-prepend" data-feather="upload-cloud"></i>Export</a> --}}
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Roles Permission</h6>
                        <div class="table-responsive">
                            <table  class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Roles</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Roles as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @foreach ($item->permissions as $RolesPermission)
                                                    <span class="badge bg-secondary">{{ $RolesPermission->name }}</span>
                                                @endforeach
                                            </td>
                                            {{-- <td>{{ $item->group_name }}</td> --}}
                                            <td><a class="btn btn-inverse-warning" href="{{ route('admin.edit.roles',$item->id) }}">Edit</a>
                                                <a class="btn btn-inverse-danger" href="{{ route('admin.delete.roles',$item->id) }}" id="delete">Delete</a> </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
