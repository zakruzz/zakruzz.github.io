<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @yield("meta",new \Illuminate\Support\HtmlString('
    <meta name="keywords" content="'.$config->meta_keywords.'">
    <meta name="description" content="'.$config->meta_description.'"> '))
    <meta name="author" content="Teknik Instrumentasi ITS">

    <title>@yield('title'){{$config->title_website}}</title>
    <link rel="icon" type="image/png" href="{{asset('storage/images/logo/'.$config->logo)}}" />

    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/fonts/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/fonts/flaticon/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/magnific-popup.min.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/default.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/app-assets/css/responsive.css')}}" />

    <link rel="stylesheet" href="{{asset('main-assets/assets/style.css')}}" />
    <link rel="stylesheet" href="{{asset('main-assets/assets/owl.css')}}" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .overlay-active {
            display: block!important;
        }

        .overlay {
            display: none;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            background: #d4fdff78;
            z-index: 9999;;
        }

        .overlay__inner {
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .overlay__content {
            left: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 240px;
            background-color: #8cdaff;
            display: flex;
            justify-content: center;
            padding: 51px;
            border-radius: 10px;
        }

        .spinner {
            width: 75px;
            height: 75px;
            display: inline-block;
            border-width: 5px;
            border-color: rgba(255, 255, 255, 0.05);
            border-top-color: #fff;
            animation: spin 1s infinite linear;
            border-radius: 100%;
            border-style: solid;
        }

        .nav-mobile{
                display: none;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 991px) {
            .nav-mobile{
                display: flex;
                justify-content: space-around;
                background-color: #fff;
                padding: 12px;
                position: fixed;
                bottom: 0;
                z-index: 999;
                width: 100%;
                box-shadow: 0 3px 25px rgb(55 125 255 / 8%);
            }

            .nav-mobile-item{
                display: flex;
                align-items: center;
                text-decoration: none;
                color: #404040;
                padding: 12px 16px;
                border-radius: 50px;
                background-color: rgba(255, 255, 255, 0);
                outline: none;
            }

            .nav-mobile-item span{
                width: 0;
                overflow: hidden;
            }

            .active-item{
                text-decoration: none;
                color: #494949;
                background-color: rgba(166, 166, 166, 0.2);
                transition: .2s;
            }

            .active-item span{
                width: 100%;
                margin-left: 8px;
                transition: .2s;
                outline: none;
                border: none;
            }
        }



    </style>

    @yield('style')

</head>
<body>

<div class="overlay">
    <div class="overlay__inner">
        <div class="overlay__content"><span class="spinner"></span></div>
    </div>
</div>

@yield('modal')

@include('main.layouts.header')

@yield('content')

@include('main.layouts.footer')

<nav class="nav-mobile">
    <a class="nav-mobile-item active-item" href="#">
        <i class="fa fa-home"></i><span>Home</span>
    </a>

    <a class="nav-mobile-item" href="#">
        <i class="fa fa-calendar"></i><span>Event</span>
    </a>

    <a class="nav-mobile-item" href="#">
        <i class="fa fa-comment"></i><span>FAQ</span>
    </a>

    <a class="nav-mobile-item" href="#">
        <i class="fa fa-user"></i><span>Login</span>
    </a>
</nav>

<a href="#" data-target="html" class="scroll-to-target scroll-to-top bg-burning-orange"><i class="fa fa-angle-up"></i></a>

<script src="{{asset('main-assets/app-assets/owl.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/popper.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/slick.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/wow.js')}}"></script>
{{--<script src="{{asset('main-assets/app-assets/js/jquery.nice-select.min.js')}}"></script>--}}
<script src="{{asset('main-assets/app-assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/main.js')}}"></script>
<script src="{{asset('main-assets/app-assets/js/owl.carousel.min.js')}}"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@include('sweetalert::alert',['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@yield('script')

</body>
</html>
