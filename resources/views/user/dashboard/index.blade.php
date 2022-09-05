@extends('user.app')

@section('title','Dashboard')

@section('style')
    <style>
        .empty-notice{
            height: 100%;
            display: flex;
            justify-content: center;
        }

        .empty-notice span{
            align-self: center;
        }

        .card-img{
            height: 190px !important;
        }
    </style>
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    @if(auth()->user()->newAccount())
                        <div class="alert alert-danger alert-validation-msg" role="alert">
                            <div class="alert-body">
                                <i data-feather="info" class="mr-50 align-middle"></i>
                                <span>Mohon untuk segera lengkapi biodata anda <a class="text-danger font-weight-bolder" href="{{route('user.profile.main')}}"><u>Klik Disini</u></a></span>
                            </div>
                        </div>
                    @endif
                    @if(!$invitation->isEmpty())
                        @foreach($invitation as $result)
                            <div class="alert alert-warning alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <i data-feather="info" class="mr-50 align-middle"></i>
                                    <span>Terdapat undangan tim untuk anda <a class="text-warning font-weight-bolder" target="_blank" href="{{route('event.invitation',\Illuminate\Support\Facades\Crypt::encryptString($result->id))}}"><u>Lihat Undangan</u></a></span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card border-0 text-white">
                                <img class="card-img" src="{{asset('admin-assets/images/background/Dashboard.jpg')}}" alt="Card image">
                                <div class="card-img-overlay bg-overlay p-2">
                                    <div class="avatar avatar-xl bg-white shadow">
                                        <div class="avatar-content">
                                            <i id="icon-greet" data-feather="coffee" class="avatar-icon text-primary"></i>
                                        </div>
                                    </div>
                                    <h5 class="text-white font-weight-bold mt-2"><span id="txt-greet">Selamat Datang</span> {{ auth()->user()->name }}</h5>
                                    <p class="card-text font-small-3">Have a nice day :)</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">

                                    @if($participant)
                                        <h5>Event yang anda ikuti 🎉 :</h5>
                                        <p class="card-text font-small-3">Anda mengikuti kompetisi <br>{{$event->name}}</p>
                                        <h3 class="mb-75 mt-1 pt-15">
                                            <a href="javascript:void(0);">{{$participant->member()->count()}} Anggota</a>
                                        </h3>
                                        <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Lihat Tim Anda</button>
                                        <img src="{{asset('admin-assets/app-assets/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic">
                                    @else
                                        <div class="empty-notice">
                                            <span>Anda masih belum mengikuti event apapun. Segera daftarkan diri anda</span><br>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-header">
                                    <h4 class="card-title">Submission</h4>
                                </div>
                                <div class="card-body">

                                    @if($task)
                                        @foreach($task as $result)
                                            <a href="{{route('user.task.main')}}">
                                                <div class="transaction-item mb-2">
                                                    <div class="media">
                                                        <div class="avatar bg-light-primary rounded">
                                                            <div class="avatar-content">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket avatar-icon font-medium-3"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline></svg>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title">{{$result->title}}</h6>
                                                            <small style="color: grey">{{auth()->user()->checkTask($result->id) ? auth()->user()->checkTask($result->id)->status : 'BELUM DIUNGGAH'}}</small>
                                                        </div>
                                                    </div>
                                                    <div class="font-weight-bolder text-danger">
                                                        {{\Carbon\Carbon::make($result->deadline)->diffForHumans()}}
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        <div class="empty-notice">
                                            <span>Masih Belum Ada</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="card-body">

                                    <div class="empty-notice">
                                        <span>Masih Belum Kegiatan Saat Ini</span>
                                    </div>
{{--                                    <div class="meetup-header d-flex align-items-center">--}}
{{--                                        <div class="meetup-day">--}}
{{--                                            <h6 class="mb-0">KAM</h6>--}}
{{--                                            <h3 class="mb-0">24</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="my-auto">--}}
{{--                                            <h4 class="card-title mb-25">Technical Meeting</h4>--}}
{{--                                            <p class="card-text mb-0">Inspection (Karya Tulis Ilmiah)</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="avatar bg-light-primary rounded mr-1">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar avatar-icon font-medium-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="mb-0">Kamis, 23 Agustus, 2021</h6>--}}
{{--                                            <small>08:00 - Selesai</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="media mt-2">--}}
{{--                                        <div class="avatar bg-light-primary rounded mr-1">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin avatar-icon font-medium-3"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="mb-0">Zoom Meeting</h6>--}}
{{--                                            <small><a href="#">Klik Disini</a></small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
