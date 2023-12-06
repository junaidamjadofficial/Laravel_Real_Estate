@extends('Admin.Admin_Dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-inverse-info" href="{{ route('add.type') }}">Add Property Type</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Type All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Type Name</th>
                                        <th>Type Icon</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->type_name }}</td>
                                            <td>{{ $item->type_icon }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td><a class="btn btn-inverse-warning" href="{{ route('edit.type',$item->id) }}">Edit</a>
                                                <a class="btn btn-inverse-danger" href="{{ route('delete.type',$item->id) }}" id="delete">Delete</a> </td>
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
