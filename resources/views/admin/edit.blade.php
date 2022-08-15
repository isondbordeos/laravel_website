@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Edit Profile</h4>
                            <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Name" name="name" value="{{ $editData->name }}" id="name">
                                    </div>
                                    @error('company')
                                        <p class="text-red-500 text-xs ml-1">{{ $name }}</p>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Username" name="username" value="{{ $editData->username }}" id="username">
                                    </div>
                                    @error('company')
                                        <p class="text-red-500 text-xs ml-1">{{ $username }}</p>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $editData->email }}" id="email">
                                    </div>
                                    @error('company')
                                        <p class="text-red-500 text-xs ml-1">{{ $email }}</p>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="profile-image" placeholder="Email" name="profile_image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show-profile-image" class="rounded avatar-lg" src="{{ $editData->profile_image ? asset('upload/admin_images/'.$editData->profile_image) : asset('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="Update Profile">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/script.js') }}"></script>
    @endpush
@endsection