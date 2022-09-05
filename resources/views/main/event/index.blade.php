@extends('main.app')
@section('title', $data->name.' - ')

@section('style')
    <link rel="stylesheet" href="{{asset('main-assets/assets/css/timeline.css')}}" />

    <style>
        .card-info-category .icon{
            font-size: 60px;
        }

        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .section-add-member{
            border: 1px solid;
            border-radius: 10px;
            padding: 15px;
        }

        .loading-overlay {
            display: none !important;
            background: rgba(255, 255, 255, 0.7);
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            z-index: 9998;
            align-items: center;
            justify-content: center;
        }

        .loading-overlay.is-active {
            display: flex!important;
        }

        .snackbar-overlay{
            display: flex;
            justify-content: center;
        }

        .snackbar {
            visibility: hidden;
            min-width: 250px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 99999999999999999;
            bottom: 30px;
            font-size: 17px;
        }

        .snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        .contact-respond .input-group {
            margin-bottom: 20px;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

    </style>
@endsection

@section('modal')
    <div class="loading-overlay">
        <span class="fas fa-spinner fa-3x fa-spin"></span>
    </div>

    <div class="snackbar-overlay">
        <div class="snackbar">Penambahan anggota telah melebihi batas maksimum..</div>
    </div>

    @include('main.event.registration')
@endsection

@section('content')

        <section class="hero-area hero-v6">
            <div class="hero-slide-single" style="background-image: url({{asset('storage/images/event/'.$data->background)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="heroku" class="hero-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div id="container-info" class="section-heading-tag wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                                            @if($data->registrationOpen())
                                                <span id="info-pendaftaran" class="single-heading-tag text-white bg-danger">Pendaftaran Telah dibuka</span>
    {{--                                            <span id="info-tanggal" class="single-heading-tag text-white bordered-tag">20 September 2021</span>--}}
                                            @endif
                                        </div>
                                        <div class="section-title section-title-white">
                                            <h1 data-animation="fadeInUp" data-delay=".1s">{{$data->name}}</h1>
                                            <div class="section-title-quote" data-animation="fadeInUp" data-delay=".2s">
                                                <p>{{$data->description}}</p>
                                            </div>
                                            <div class="section-button-wrapper section-dual-button" data-animation="fadeInUp" data-delay=".3s">
                                            @if($data->status == "COMING SOON")
                                                    <button type="button" class="filled-btn bg-clear-blue mb-2"> Coming Soon <i class="fas fa-clock"></i> </button>
                                            @else
                                            <span>
                                                @if($data->status == 'OPEN')
                                                    @if($data->isInspection())
                                                        @guest
                                                            <a href="{{route('event.registration', $data->slug)}}" class="filled-btn bg-clear-blue mb-2" > Daftar Sekarang <i class="fas fa-arrow-right"></i> </a>
                                                        @else
                                                            <button type="button" class="filled-btn bg-clear-blue mb-2" data-toggle="modal" data-target="#registerModal"> Daftar Sekarang <i class="fas fa-arrow-right"></i> </button>
                                                        @endguest
                                                    @else
                                                        <button type="button" class="filled-btn bg-clear-blue mb-2" data-toggle="modal" data-target="#registerModal"> Daftar Sekarang <i class="fas fa-arrow-right"></i> </button>
                                                    @endif
                                                @endif
                                            </span>
                                            <span>
                                                <a href="{{route('event.download', $data->slug)}}" target="_blank" class="filled-btn btn-bordered mb-2"> Download Guidebook <i class="fas fa-arrow-circle-down"></i> </a>
                                            </span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex justify-content-center">
                                        <img class="box-shadow-2" style="height: 350px; border-radius: 10px" src="{{asset('storage/images/event/'.$data->poster)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="counter-up-area section-bg-overflow">
            <div class="container-fluid">
                <div class="counterup-internal bg-primary-blue wow fadeInUp d-flex justify-content-center" style="background-image: url({{asset('&quot;main-assets/app-assets/img/particle/section-curve-shape.svg&quot;')}}); visibility: visible; animation-duration: 2500ms; animation-delay: 0ms; animation-name: fadeInUp; margin-top: -4rem; z-index: 9" data-wow-delay="00ms" data-wow-duration="2500ms">
                    <div class="row align-items-center ">

                        <div class="col-lg-12">
                            <div class="single-counter-up single-counter-up-v2">
                                <div class="counterup-info">
                                    <h2 class="card-info-category">
                                        <span class="icon"><i class="fas fa-users"></i></span>
                                    </h2>
                                    <p>{{$data->short_desc}} <br> <small>{{$data->short_subdesc}}</small></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="pricing-area pt-130 pb-95">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="section-title text-center mb-105 section-title-ocean-blue">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Reward</span>
                            </div>
                            <h2>
                                Dapatkan Reward dari kita <br class="d-none d-md-block" />
                                <span>untuk keahlian mu</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Single Pricing Table -->
                    <div class="col-lg-4">
                        <div class="pricing-table professional-plan wow fadeInUp bg-silver text-center" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pricing-plan-title">
                                <div class="pricing-table-icon text-center">
                                    <i id="icon-piala" class="far fa-award"></i>
                                </div>
                                <div class="pricing-plan-cost text-center">
                                    <h3 id="title-juara">{{$data->reward_2}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Pricing Table -->
                    <div class="col-lg-4">
                        <div class="pricing-table professional-plan wow fadeInUp bg-gold text-center" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pricing-plan-title">
                                <div class="pricing-table-icon text-center">
                                    <i id="icon-piala" class="far fa-trophy"></i>
                                </div>
                                <div class="pricing-plan-cost text-center">
                                    <h3 id="title-juara">{{$data->reward_1}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Pricing Table -->
                    <div class="col-lg-4">
                        <div class="pricing-table professional-plan wow fadeInUp bg-bronze text-center" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pricing-plan-title">
                                <div class="pricing-table-icon text-center">
                                    <i id="icon-piala" class="far fa-award"></i>
                                </div>
                                <div class="pricing-plan-cost text-center">
                                    <h3 id="title-juara">{{$data->reward_3}}</h3>
                                </div>
                            </div>
    {{--                        <div class="pricing-plan-features">--}}
    {{--                            <ul>--}}
    {{--                                <li class="plan-feature">Uang Pembinaan Rp.1.500.000,-</li>--}}
    {{--                                <li class="plan-feature">Sertifikat</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        @if($data->status != "COMING SOON")
        <section id="time-line" class="timeline bg-tuna">
            <h1 class="text-center">Timeline</h1>
            <div class="wrapper-main">
                <div class="center-line">
                    <a href="#time-line" class="scroll-icon"><i class="fas fa-caret-up"></i></a>
                </div>

                @foreach($data->timeline()->get() as $i => $result)
                    @php $key = $i + 1; @endphp
                    <div class="row-main row-{{$key % 2 == 0 ? '2' : '1'}}">
                        <section>
                            <i class="icon fas fa-circle"></i>
                            <div class="details">
                                <span class="title">{{$result->name}}</span>
                                <span>{{\Carbon\Carbon::make($result->date)->isoFormat('DD MMMM YYYY')}}</span>
                            </div>
                            @if($result->isActive())
                                <p>{{$result->description}}</p>
                                <span class="badge badge-danger">Sedang Berjalan</span>
                            @endif
                        </section>
                    </div>
                @endforeach

            </div>
        </section>
        <!-- end timeline -->

        <section class="faq-area bg-magnolia pt-130 pb-130">
            <div class="container">
                <div class="section-internal">
                    <div class="section-particle-effect d-none d-md-block section-particle-effect-v2">
                        <img class="particle-1 animate-zoom-fade" src="{{asset('main-assets/app-assets/img/particle/particle-1.png')}}" alt="particle One" />
                        <img class="particle-2 animate-rotate-me" src="{{asset('main-assets/app-assets/img/particle/particle-2.png')}}" alt="particle Two" />
                        <img class="particle-3 animate-float-bob-x" src="{{asset('main-assets/app-assets/img/particle/particle-3.png')}}" alt="particle Three" />
                        <img class="particle-4 animate-zoominout" src="{{asset('main-assets/app-assets/img/particle/particle-4.png')}}" alt="particle Four" />
                        <img class="particle-5 animate-zoominout" src="{{asset('main-assets/app-assets/img/particle/particle-5.png')}}" alt="particle Five" />
                        <img class="particle-7 animate-float-bob-x" src="{{asset('main-assets/app-assets/img/particle/particle-7.png')}}" alt="particle Seven" />
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="faq-content content-right-spacer">
                                <div class="section-title section-title-ocean-blue">
                                    <div class="section-heading-tag">
                                        <span class="single-heading-tag">FAQ</span>
                                    </div>
                                    <h2>
                                        Pertanyaan Seputar
                                        <span>{{$data->name}}</span>
                                    </h2>
                                </div>
                                <div class="section-accordion">
                                    <div class="accordion" id="accordionFAQ">
                                        @foreach($data->faq()->take(4)->get() as $i => $result )
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-right-image animate-float-bob-y wow fadeInUp" data-wow-delay="0ms" data-wow-duration="2500ms">
                                <img src="{{asset('main-assets/app-assets/img/faq/faq-image.png')}}" alt="faq image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>

        $(document).on('submit', '#form-data', function(e) {
            e.preventDefault();

            $('.loading-overlay').addClass('is-active');

            $.ajax({
                url: $("#form-data").attr('action'),
                method: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
            }).then((result) => {
                $('.loading-overlay').removeClass('is-active');
                if (result.success) {
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses!',
                        text: result.message,
                    }).then(function() {
                        location.reload();
                    });
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: result.message,
                    });
                }
            });
        });

        $("#addMember").click(function () {
            var html = '';
            var count = $('.add-member').length;

            if (count === 2){
                $('.snackbar').addClass('show');

                setTimeout(function(){ $('.snackbar').removeClass('show'); }, 3000);

            }else {
                html += '<div id="inputMember" class="input-group add-member">';
                html += '<div class="input-group mb-0">';
                html += '<input type="email" class="form-control" id="fullName" placeholder="Masukkan Email Anggota '+ (count+1) +' ..." name="email_member[]" required="">';
                html += '<label for="fullName">Anggota '+ (count+1) +' :</label>';
                html += '<div class="input-group-append">';
                html += '<button id="removeRow" type="button" class="btn btn-danger"> <i class="fa fa-window-close"></i></button>';
                html += '</div>';
                html += '</div>';

                $('#newMember').append(html);
            }

        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputMember').remove();
        });
    </script>
@endsection
