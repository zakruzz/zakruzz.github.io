@extends('main.app')
@section('title', 'FAQ - ')

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

    <section class="subscribe-newsletter-area bg-white-lilac pt-130 pb-123" style="background-image: url({{asset('main-assets/app-assets/img/particle/newsletter-bg.png')}});">
        <div class="container">
            <div class="section-internal">
                <div class="section-particle-effect d-none d-md-block section-particle-effect-v4">
                    <img class="particle-1 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/particle-2.png')}}" alt="particle One">
                    <img class="particle-2 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/gradient-curve-shape-2.png')}}" alt="particle Two">
                    <img class="particle-3 animate-zoominout" src="{{asset('main-assets/app-assets/img/particle/particle-4.png')}}" alt="particle Three">
                    <img class="particle-4 animate-float-bob-y" src="{{asset('main-assets/app-assets/img/particle/particle-5.png')}}" alt="particle Five">
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-xl-7 col-lg-10">
                        <div class="subscribe-newsletter-content">
                            <div class="section-title mb-35">
                                <h2 class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">Pertanyaan Seputar <br class="d-none d-md-block">Instrumentation Festival 2022</h2>
                            </div>
                            <div class="newsletter-form newsletter-form-v2 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1500ms" >
                                <form action="{{route('faq')}}" method="GET" novalidate>
                                    <div class="form-group">
                                        <input type="email" name="query" id="emailAddress" class="form-control" value="{{$query}}" placeholder="Cari Pertanyaan...">
                                        <button type="submit" name="submit" value="Go" class="filled-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.section-internal -->
        </div> <!-- /.container -->
    </section> <!-- /.subscribe-newsletter-area -->

    <section class="faq-area pt-135 pb-125">
        <div class="container">
            <div class="section-internal">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="faq-content content-right-spacer">
                            <div class="section-title mb-40">
                                <h2>{{$query ? "Mencari tentang '$query'" : 'Frequently Asked Questions'}}</h2>
                            </div>
                            <div class="section-accordion section-accordion-v2">
                                <div class="accordion" id="accordionFAQ">
                                    @if($data->isEmpty())
                                        <h5 class="text-center">FAQ tidak ada/tidak ditemukan :(</h5>
                                    @endif
                                    @foreach($data as $i => $result )
                                        <div class="accordion-item">
                                            <h5 class="accordion-header" id="heading{{$i}}">
                                                <button class="accordion-button {{$i == 0 ? '' : 'collapsed'}}" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="{{$i == 0 ? 'true' : ''}}" aria-controls="collapse{{$i}}">
                                                    {{$result->question}}</button>
                                            </h5>
                                            <div id="collapse{{$i}}" class="collapse {{$i == 0 ? 'show' : ''}}" aria-labelledby="heading{{$i}}" data-parent="#accordionFAQ">
                                                <div class="accordion-body">
                                                    <p>{{$result->answer}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> <!-- /.accordion -->
                            </div> <!-- /.section-accordion -->
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.section-internal -->
        </div> <!-- /.container -->
    </section> <!-- /.faq-area -->
    <!--====== End FAQ Area ======-->
    <!--====== Start Subscribe Newsletter Area ======-->


@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        })
    </script>
@endsection
