@extends('Admin.Admin_Dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            
                            <div>
                                <img class="wd-100 rounded-circle" src="{{ !empty($profileData->photo)?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                                <span class="h4 ms-3">{{ $profileData->username }}</span>
                            </div>
                           
                        </div>
                        <p>Hi! I'm {{ $profileData->username }} the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of
                            Social.</p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($profileData->created_at)->format('d M Y') }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">{{ $profileData->address ?? 'Undefined' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email ?? 'undefined' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                            <p class="text-muted">{{ $profileData->username ?? 'undefined'}}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Admin Change password</h6>

                                <form class="forms-sample" method="POST" action="{{ route('Admin.profile.update.password') }}">
                                    @csrf
                                    {{-- <div class="mb-3">
                                        <label for="exampleInputname1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputname1"
                                            autocomplete="off" name="name" value="{{ $profileData->name }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                        autocomplete="off" name="email" value="{{ $profileData->email }}" readonly>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="old_password" class="form-label">Old Password</label>
                                        <input type="password" class="form-control @error('old_password')
                                            is-invalid
                                        @enderror" 
                                        id="old_password" autocomplete="off" name="old_password">
                                        @error('old_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('new_password')
                                            is-invalid
                                        @enderror" 
                                        id="new_password" autocomplete="off" name="new_password">
                                        @error('new_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control "id="new_password_confirmation"
                                         autocomplete="off" name="new_password_confirmation">
                                        
                                    </div>
                                    
                                    
                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>

                            </div>
                        </div>
                   
                </div>
            </div>
           
        </div>

    </div>

   
@endsection
