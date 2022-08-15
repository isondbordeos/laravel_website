@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br>
                        <div class="card-body">
                            <h4 class="card-title">Edit Slider</h4>
                            <form action="{{ count($sliderDatas) > 0 ? route('home.update_slider', $sliderDatas[0]->id) : route('home.add_slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(count($sliderDatas) > 0)
                                @method('PUT')
                                    @foreach ($sliderDatas as $sliderData)

                                        @error('title')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Title" name="title" value="{{ $sliderData->title ? $sliderData->title : '' }}" id="title">
                                            </div>
                                        </div>

                                        @error('short_title')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Short Title" name="short_title" value="{{ $sliderData->short_title ? $sliderData->short_title : '' }}" id="short-title">
                                            </div>
                                        </div>

                                        @error('video_url')
                                            <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                        @enderror
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Video Url" name="video_url" value="{{ $sliderData->video_url ? $sliderData->video_url : '' }}" id="video-url">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="slider-image" placeholder="Email" name="slider_image">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <img id="show-slider-image" class="rounded avatar-lg" src="{{ $sliderData->slider_image ? asset('upload/home/'.$sliderData->slider_image) : asset('upload/no_image.jpg') }}" alt="Card image cap">
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

                                    @error('video_url')
                                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</p>
                                    @enderror
                                    
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Video Url" name="video_url" value="" id="video-url">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="slider-image" placeholder="Email" name="slider_image">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <img id="show-slider-image" class="rounded avatar-lg" src="{{ asset('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                @endif

                                <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" name="submit" value="{{ count($sliderDatas) > 0 ? 'Update Slider' : 'Add Slider'}}">
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