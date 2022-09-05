@extends('main.app')

@section('style')
    <style>
        .carousel-fade .carousel-item {
            opacity: 0;
            transition-duration: .9s;
            transition-property: opacity;
        }

        .carousel-fade  .carousel-item.active,
        .carousel-fade  .carousel-item-next.carousel-item-left,
        .carousel-fade  .carousel-item-prev.carousel-item-right {
            opacity: 1;
        }

        .carousel-fade .active.carousel-item-left,
        .carousel-fade  .active.carousel-item-right {
            opacity: 0;
        }

        .carousel-fade  .carousel-item-next,
        .carousel-fade .carousel-item-prev,
        .carousel-fade .carousel-item.active,
        .carousel-fade .active.carousel-item-left,
        .carousel-fade  .active.carousel-item-prev {
            transform: translateX(0);
            transform: translate3d(0, 0, 0);
        }

        .video-youtube-player{
            width: 100%;
            height: 520px;
            border-radius: 10px;
        }

        @media (max-width: 991px) {
            .video-youtube-player{
                height: 300px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="preloader">
        <img class="preloader-image" width="60" src="{{asset('storage/images/logo/'.$config->logo_white)}}" alt="preloader"/>
    </div> <!-- /.preloader -->

    <section class="hero-area hero-v3 bg-contain bg-tuna" style="background-image: url(assets/img/hero/hero-leaf-bg.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <div class="section-particle-effect d-none d-lg-block">
                            <img class="particle-1 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/particle-8.png')}}" alt="particle One">
                            <img class="particle-3 animate-zoominout" src="{{asset('main-assets/app-assets/img/particle/particle-9.png')}}" alt="particle Three">
                        </div>
                        <div class="section-title section-title-white">
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="2500ms">Instrumentation Festival <span>2023 </span></h1>
                            <div class="section-button-wrapper section-dual-button wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="2500ms">
                                <span>
                                    <a href="#about-infest" class="filled-btn">
                                        Discover More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </span>
                                <span class="play-video">
                                    <a href="#teaser-infest" class="play-btn">
                                        <i class="fas fa-play pulse-animated"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-right-image-wrapper text-center text-lg-right wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="2500ms">
                        <img src="assets/img/hero/hero-mobile-on-hand.png" alt="hero right image">
                    </div> <!-- /.blob-right-image-wrapper -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- .container -->
    </section> <!-- /.hero-area -->

    <section id="about-infest" class="our-statistics-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="our-statistics-images content-left-spacer content-right-spacer">
                        <div class="our-statistics-image-relative animate-float-bob-y">
                            <img src="{{asset('storage/images/background/About-1.jpg')}}" alt="our statistic right">
                        </div>
                        <div class="our-statistics-image-main">
                            <img src="{{asset('storage/images/background/About-2.jpg')}}" alt="our statistic main">
                        </div>
                        <div class="our-statistics-image-absolute animate-float-bob-x">
                            <img src="{{asset('storage/images/background/About-3.jpg')}}" alt="our statistic left">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="our-statistics-content content-right-spacer">
                        <div class="section-title section-title-clear-blue">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Apa Itu INFEST 2023?</span>
                            </div>
                            <h2>Instrumentation Festival 2022</h2>
                            <div class="section-title-description">
                                <p class="mb-10">INFEST (Instrumentation Festival) adalah big event dari Himpunan Mahasiswa Teknik Instrumentasi ITS.</p>
                                <p>Kegiatan INFEST dibagi dalam tiga sub event INSPECTION (Instrumentation Paper Competition), INTSHOW (Instrumentation Talk Show) dan INSTRAINING (Instrumentation Training)</p>
                            </div>
                            <div class="section-button-wrapper">
                                <a href="{{route('about')}}" class="filled-btn bg-burning-orange">
                                    Baca Lebih Lanjut <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="teaser-infest" class="featured-video-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <iframe class="video-youtube-player" src="https://www.youtube.com/embed/gej4Vvv1lqI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <section class="our-services our-services-v1 pt-150 pb-100" style="background-image: url({{asset('main-assets/app-assets/img/services/dots-pattern-bg.png')}})">

        <div class="container">
            <div class="service-area-internal">
                <div class="section-particle-effect d-none d-lg-block">
                    <img class="particle-1 animate-zoominout" src="{{asset('main-assets/app-assets/img/particle/gradient-ball-shape.png')}}" alt="ball shape" />
                    <img class="particle-3 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/gradient-curve-shape.png')}}" alt="curve shape" />
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title mb-105 text-center section-title-ocean-blue">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Semua Event</span>
                            </div>
                            <h2>
                                Yuk Ikuti Semua <br class="d-none d-md-block" />
                                <span>Event</span> Kita
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="service-area-content">
            <div class="container-fluid">
                <div class="row">
                    @foreach($event as $result)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-service-box single-service-box-v2 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-thumbnail">
                                    <img style="border-radius: 50%" src="{{asset('storage/images/event/'.$result->logo)}}" alt="" />
                                </div>
                                <div class="service-box-content">
                                    <h5 class="service-box-title">{{$result->name}}</h5>
                                    <div class="service-box-btn">
                                        <a href="{{route('event.detail',$result->slug)}}"><i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="testimonial-area bg-tuna border-0 bg-contain testimonial-area-overflow pb-120 mt-1" style="background-image: url({{asset('storage/images/background/Testimonial.jpg')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="testimonial-slider testimonial-slider-v2" id="testimonial-slider-v2">
                        @foreach($testimonial as $result)
                        <div class="single-testimonial single-testimonial-v2">
                            <div class="quote-thumbnail">
                                <i class="flaticon-right-quote"></i>
                            </div>
                            <p>{{$result->testimonial}}</p>
                            <div class="testimonial-author">
                                <img style="width: 100px;height: 100px;object-fit: cover;" src="{{asset('storage/images/testimonial/'.$result->image)}}" alt="{{$result->fullname}}">
                                <h6>{{$result->fullname}} <span>{{$result->job_position}}<br>{{$result->institution}}</span></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brands-area bg-light-magnolia pt-50 pb-50 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="2500ms">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="brands-slider" id="brands-slider-v2">
                        @foreach($sponsor as $result)
                            <div class="brands-item">
                                <img src="{{asset('storage/images/sponsor/'.$result->logo)}}" alt="{{$result->name}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        })
    </script>
@endsection
