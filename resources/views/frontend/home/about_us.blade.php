<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ($multiImgData as $multiImg)
                        <li>
                            <img class="light" src="{{ $multiImg->multi_image ? asset('upload/about/multi/'.$multiImg->multi_image) : asset('upload/no_image.jpg') }}" alt="XD">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $aboutData->title ? $aboutData->title : '' }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ $aboutData->about_img ? asset('upload/about/'.$aboutData->about_img) : asset('upload/no_image.jpg') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $aboutData->short_title ? $aboutData->short_title : '' }}</p>
                        </div>
                    </div>
                    <p class="desc">{!! $aboutData->short_desc ? $aboutData->short_desc : '' !!}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>