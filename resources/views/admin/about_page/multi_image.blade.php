@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Add About Multi Image</h4>
                            <form action="{{ route('about.multi.image.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="about-multi-img" placeholder="Multi Image" name="about_multi_image[]" multiple>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show-about-multi-img" class="rounded avatar-lg" src="{{ asset('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="Add Multi Image">
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