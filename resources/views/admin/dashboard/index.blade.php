@extends('admin.app')

@section('title','Dashboard')

@section('style')
    <style>
        .shortcut-btn-card-1{
            background-image: linear-gradient(to right, #0e5768, #157e97);
        }

        .shortcut-btn-card-2{
            background-image: linear-gradient(to right, #157e97 , #1ca3c7);
        }

        .shortcut-btn-card-3{
            background-image: linear-gradient(to right, #1ca3c7 , #20bce5);
        }

        .shortcut-btn-card-4{
            background-image: linear-gradient(to right, #20bce5 , #24d1ff);
        }


        .shortcut-btn-body{
            /*padding: 10px;*/
        }

        .shortcut-btn-icon svg{
            color: white;
            height: 3rem;
            width: 3rem;
            margin-bottom: 20px;
        }

        .shortcut-btn-title{
            color: white;
            font-weight: bold;
            margin-bottom: unset!important;
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
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
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

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">0</h4>
                                                    <p class="card-text font-small-3 mb-0">Pendaftaran</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">0</h4>
                                                    <p class="card-text font-small-3 mb-0">Peserta</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">0</h4>
                                                    <p class="card-text font-small-3 mb-0">Merchandise</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">0</h4>
                                                    <p class="card-text font-small-3 mb-0">Unknown</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                    <h6 class="my-2 text-muted">Shortcut Menu</h6>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card shortcut-btn-card-1 mb-2">
                                <div class="card-body text-center shortcut-btn-body">
                                    <div class="shortcut-btn-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                    <h4 class="card-title shortcut-btn-title">Admin</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card shortcut-btn-card-2 mb-2">
                                <div class="card-body text-center shortcut-btn-body">
                                    <div class="shortcut-btn-icon">
                                        <i data-feather="shopping-cart"></i>
                                    </div>
                                    <h4 class="card-title shortcut-btn-title">Merchandise</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card shortcut-btn-card-3 mb-2">
                                <div class="card-body text-center shortcut-btn-body">
                                    <div class="shortcut-btn-icon">
                                        <i data-feather="settings"></i>
                                    </div>
                                    <h4 class="card-title shortcut-btn-title">Konfigurasi Website</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card shortcut-btn-card-4 mb-2">
                                <div class="card-body text-center shortcut-btn-body">
                                    <div class="shortcut-btn-icon">
                                        <i data-feather="globe"></i>
                                    </div>
                                    <h4 class="card-title shortcut-btn-title">Visit Site</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
