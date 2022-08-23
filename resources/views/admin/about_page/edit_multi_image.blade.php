@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Edit Image</h4>
                            <form action="{{ route('about.multi.image.update', $multiImage->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="update-multi-img" placeholder="Image" name="about_multi_image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="show-update-multi-img" class="rounded avatar-lg" src="{{ $multiImage->multi_image ? asset('upload/about/multi/'.$multiImage->multi_image) : asset('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="Update Image">
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