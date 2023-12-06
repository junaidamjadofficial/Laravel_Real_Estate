@extends('Admin.Admin_Dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-inverse-info" href="{{ route('add.admin') }}">Add Admin</a>
                
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Admin All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($AllAdmin as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.jpg/') }}" style="width:70px;height:70px" alt=""></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td> 
                                                @foreach($item->roles as $role)
                                                    <span class="badge badge-pill bg-primary">{{ $role->name }}</span>
                                                @endforeach 
                                            </td>
                                            <td><a class="btn btn-inverse-warning" href="{{ route('edit.admin',$item->id) }}" title="Edit"><i data-feather="edit"></i></a>
                                                <a class="btn btn-inverse-danger" href="{{ route('delete.admin',$item->id) }}" id="delete"title="Delete"><i data-feather="trash-2"></i></a> </td>
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
