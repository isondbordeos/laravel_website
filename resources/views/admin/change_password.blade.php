@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Change Password Page</h4>

                            @php
                                // print_r($errors);
                                // echo count($errors);
                            @endphp
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}</p>
                                @endforeach
                            @endif

                            <form action="{{ route('admin.update_password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Current Password" name="currentPassword" value="" id="current-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="New Password" name="newPassword" value="" id="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirmation Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Confirmation Password" name="confirmationPassword" value="" id="confirmation-password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="Update Password">
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