@extends('layouts.app')

@section('content')

    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
        
    <div class="p-3">
        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" type="text" id="name" name="name" required="" placeholder="Name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" type="text" id="username" name="username" required="" placeholder="Username" value="{{ old('username') }}">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" type="email" id="email" name="email" required="" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required="" placeholder="Password Confirmation">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center row mt-3 pt-1">
                <div class="col-12">
                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                </div>
            </div>

            <div class="form-group mt-2 mb-0 row">
                <div class="col-12 mt-3 text-center">
                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                </div>
            </div>
        </form>
        <!-- end form -->
    </div>

@endsection