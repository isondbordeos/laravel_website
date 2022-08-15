@extends('layouts.app')

@section('content')
    <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
        
    <div class="p-3">
        <form class="form-horizontal mt-3" action="{{ route('password.email') }}">
            @csrf

            <div class="alert alert-info alert-dismissible fade show" role="alert">
            Enter Your <strong>E-mail</strong> and instructions will be sent to you!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="form-group mb-3">
                <div class="col-xs-12">
                    <input class="form-control" type="email" required="" placeholder="Email">
                </div>
            </div>

            <div class="form-group pb-2 text-center row mt-3">
                <div class="col-12">
                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                </div>
            </div>
        </form>
    </div>
@endsection