@extends('main.app')
@section('title', 'Tentang Kami - ')

@section('style')
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .img-product{
            height: 250px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="section-internal">
                <div class="section-particle-effect d-none d-md-block section-particle-effect-v3">
                    <img class="particle-1 animate-zoom-fade" src="{{asset('main-assets/app-assets/img/particle/particle-1.png')}}" alt="particle One">
                    <img class="particle-2 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/particle-2.png')}}" alt="particle Two">
                    <img class="particle-3 animate-float-bob-x" src="{{asset('main-assets/app-assets/img/particle/particle-3.png')}}" alt="particle Three">
                    <img class="particle-4 animate-float-bob-y" src="{{asset('main-assets/app-assets/img/particle/particle-4.png')}}" alt="particle Four">
                    <img class="particle-5 animate-float-bob-y" src="{{asset('main-assets/app-assets/img/particle/particle-5.png')}}" alt="particle Five">
                </div>
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <div class="page-title wow fadeInDown" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeInDown;">
                                <h1>Tentang INFEST</h1>
                            </div>
                            <div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Beranda</a></li>
                                    <li class="active">Tentang INFEST</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.section-internal -->
        </div> <!-- /.container -->
    </section>

    <section class="about-us-area pt-50 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="about-images content-right-spacer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="animate-square-zoom wow fadeInDown" data-wow-delay="0.1s">
                                    <img class="about-thumbnail about-thumbnail-1" src="{{asset('storage/images/background/About-1.jpg')}}" alt="about thumbnail one">
                                </div>
                                <div class="animate-square-zoom wow fadeInUp" data-wow-delay="0.3s">
                                    <img class="about-thumbnail about-thumbnail-3" src="{{asset('storage/images/background/About-2.jpg')}}" alt="about thumbnail three">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="animate-square-zoom wow fadeInDown" data-wow-delay="0.2s">
                                    <img class="about-thumbnail about-thumbnail-2" src="{{asset('storage/images/background/About-3.jpg')}}" alt="about thumbnail two">
                                </div>
{{--                                <div class="animate-square-zoom wow fadeInUp" data-wow-delay="0.5s">--}}
{{--                                    <img class="about-thumbnail about-thumbnail-4" src="{{asset('main-assets/app-assets/img/about/about-thumbnail-4.jpg')}}" alt="about thumbnail four">--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about-us-content">
                        <div class="section-title">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Tentang</span>
                            </div>
                            <h2>Instrumentation Festival 2022</h2>
                            <div class="section-title-description">
                                <p class="mb-10">INFEST (Instrumentation Festival) adalah big event dari Himpunan Mahasiswa Teknik Instrumentasi ITS.</p>
                                <p class="mb-10">Kegiatan INFEST dibagi dalam tiga sub event INSPECTION (Instrumentation Paper Competition), INTSHOW (Instrumentation Talk Show) dan INSTRAINING (Instrumentation Training)</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt, dolor vel posuere ultrices, ante dolor sagittis odio, ut dignissim dui nisi ultrices ipsum. Suspendisse auctor ex quis purus molestie, eget dignissim augue consequat. In suscipit ornare malesuada. Quisque fermentum gravida ligula sed molestie. Proin et libero dui. Nulla facilisi. Phasellus vulputate venenatis augue id ultrices. Nam eu tristique tellus, quis sagittis enim.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col-lg-5 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.about-us-area -->

    <section class="our-services border-top-blue pt-80 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-70">
                        <h2>Event  <br class="d-none d-md-block"> Instrumentation Festival 2022</h2>
                    </div>
                </div> <!-- /.col-lg-8 -->
            </div> <!-- /.row -->
            <div class="our-services-content-wrapper">
                <div class="row">
                    @foreach($event as $result)
                        <div class="col-xl-3 col-lg-6">
                            <div class="single-iconic-box iconic-box-v4 wow fadeInDown" data-wow-delay="0.1s" data-wow-duration="2000ms" style="height: 425px">
                                <div class="iconic-box-icon iconic-box-gradient-3">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="iconic-box-body">
                                    <h5 class="iconic-box-title">{{$result->name}}</h5>
                                    <p class="iconic-box-content">
                                        {{$result->description}}
                                    </p>
                                    <a href="{{route('event.detail',$result->slug)}}">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div> <!-- /.col-lg-6-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
@endsection
