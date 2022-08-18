@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Edit about</h4>
                            <form action="{{ count($aboutDatas) > 0 ? route('about.update', $aboutDatas[0]->id) : route('about.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(count($aboutDatas) > 0)
                                @method('PUT')
                                    @foreach ($aboutDatas as $aboutData)

                                        @error('title')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Title" name="title" value="{{ $aboutData->title ? $aboutData->title : '' }}" id="title">
                                            </div>
                                        </div>

                                        @error('short_title')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Short Title" name="short_title" value="{{ $aboutData->short_title ? $aboutData->short_title : '' }}" id="short-title">
                                            </div>
                                        </div>

                                        @error('short_desc')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="short_desc" id="short-desc" rows="5">{{ $aboutData->short_desc ? $aboutData->short_desc : '' }}</textarea>
                                            </div>
                                        </div>

                                        @error('long_desc')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="elm1" name="long_desc" id="long-desc">{{ $aboutData->long_desc ? $aboutData->long_desc : '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="about-img" placeholder="Email" name="about_img">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <img id="show-about-img" class="rounded avatar-lg" src="{{ $aboutData->about_img ? asset('upload/about/'.$aboutData->about_img) : asset('upload/no_image.jpg') }}" alt="Card image cap">
                                            </div>
                                        </div>
                                    
                                    @endforeach

                                @else

                                    @error('title')
                                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                    @enderror

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Title" name="title" value="" id="title">
                                        </div>
                                    </div>

                                    @error('short_title')
                                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                    @enderror
                                    
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Short Title" name="short_title" value="" id="short-title">
                                        </div>
                                    </div>

                                    @error('short_desc')
                                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                    @enderror
                                    
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="short_desc" id="short-desc" rows="5"></textarea>
                                        </div>
                                    </div>

                                    @error('long_desc')
                                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                    @enderror
                                    
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                        <div class="col-sm-10">
                                            <textarea id="elm1" name="long_desc" id="long-desc"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="about-img" placeholder="Email" name="about_img">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <img id="show-about-img" class="rounded avatar-lg" src="{{ asset('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                @endif

                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="{{ count($aboutDatas) > 0 ? 'Update About Us' : 'Add About Us'}}">
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