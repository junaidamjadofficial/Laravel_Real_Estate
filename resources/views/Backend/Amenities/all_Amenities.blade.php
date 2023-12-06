@extends('Admin.Admin_Dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a class="btn btn-inverse-info" href="{{ route('add.Amenitie') }}">Add Amenities</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Amenities All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Amenities Name</th>
                                      
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Amenities as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->amenities_name }}</td>
                                            <td><a class="btn btn-inverse-warning" href="{{ route('edit.Amenitie',$item->id) }}">Edit</a>
                                                @if(Auth::user()->can('edit.Amenitie'))
                                                <a class="btn btn-inverse-danger" href="{{ route('delete.Amenitie',$item->id) }}" id="delete">Delete</a> </td>
                                            @endif   
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
