@extends('main.app')
@section('style')
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700');
        @import url('https://fonts.googleapis.com/css?family=Catamaran:400,800');
        .error-page{
            background-color: currentColor;
        }
        .error-container {
            text-align: center;
            font-size: 180px;
            font-family: 'Catamaran', sans-serif;
            font-weight: 800;
            margin: 20px 15px;
        }
        .error-container > span {
            display: inline-block;
            line-height: 0.7;
            position: relative;
            color: #FFB485;
        }
        .error-container > span {
            display: inline-block;
            position: relative;
            vertical-align: middle;
        }
        .error-container > span:nth-of-type(1) {
            color: #D1F2A5;
            animation: colordancing 4s infinite;
        }
        .error-container > span:nth-of-type(3) {
            color: #F56991;
            animation: colordancing2 4s infinite;
        }
        .error-container > span:nth-of-type(2) {
            width: 120px;
            height: 120px;
            border-radius: 999px;
        }
        .error-container > span:nth-of-type(2):before,
        .error-container > span:nth-of-type(2):after {
            border-radius: 0%;
            content:"";
            position: absolute;
            top: 0; left: 0;
            width: inherit; height: inherit;
            border-radius: 999px;
            box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4),
            inset 0 30px 0 rgba(239, 250, 180, 0.4),
            inset -30px 0 0 rgba(255, 196, 140, 0.4),
            inset 0 -30px 0 rgba(245, 105, 145, 0.4);
            animation: shadowsdancing 4s infinite;
        }
        .error-container > span:nth-of-type(2):before {
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .screen-reader-text {
            position: absolute;
            top: -9999em;
            left: -9999em;
        }
        .error-page-content h2{
            color: white;
        }
        .error-page-content p{
            color: white;
        }
        @keyframes shadowsdancing {
            0% {
                box-shadow: inset 30px 0 0 rgba(165, 242, 239, 0.4),
                inset 0 30px 0 rgba(225, 180, 250, 0.4),
                inset -30px 0 0 rgba(140, 165, 255, 0.4),
                inset 0 -30px 0 rgba(224, 105, 245, 0.4);
            }
            25% {
                box-shadow: inset 30px 0 0 rgba(140, 165, 255, 0.4),
                inset 0 30px 0 rgba(165, 242, 239, 0.4),
                inset -30px 0 0 rgba(225, 180, 250, 0.4),
                inset 0 -30px 0 rgba(224, 105, 245, 0.4);
            }
            50% {
                box-shadow: inset 30px 0 0 rgba(140, 165, 255, 0.4),
                inset 0 30px 0 rgba(224, 105, 245, 0.4),
                inset -30px 0 0 rgba(165, 242, 239, 0.4),
                inset 0 -30px 0 rgba(225, 180, 250, 0.4);
            }
            75% {
                box-shadow: inset 30px 0 0 rgba(225, 180, 250, 0.4),
                inset 0 30px 0 rgba(140, 165, 255, 0.4),
                inset -30px 0 0 rgba(224, 105, 245, 0.4),
                inset 0 -30px 0 rgba(165, 242, 239, 0.4);
            }
            100% {
                box-shadow: inset 30px 0 0 rgba(165, 242, 239, 0.4),
                inset 0 30px 0 rgba(225, 180, 250, 0.4),
                inset -30px 0 0 rgba(140, 165, 255, 0.4),
                inset 0 -30px 0 rgba(224, 105, 245, 0.4);
            }
        }
        @keyframes colordancing {
            0% {
                color: #a5bff2;
            }
            25% {
                color: #d769f5;
            }
            50% {
                color: #8ca9ff;
            }
            75% {
                color: #edb4fa;
            }
            100% {
                color: #3afff7;
            }
        }
        @keyframes colordancing2 {
            0% {
                color: #a5bff2;
            }
            25% {
                color: #d769f5;
            }
            50% {
                color: #8ca9ff;
            }
            75% {
                color: #edb4fa;
            }
            100% {
                color: #3afff7;
            }
        }
    </style>
@endsection
@section('content')
    <section class="error-page pt-130 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="error-page-content-wrapper text-center">
                        <div class="error-image animate-float-bob-x wow fadeInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: float-bob-x;">
                            <section class="error-container">
                                <span>4</span>
                                <span><span class="screen-reader-text">0</span></span>
                                <span>4</span>
                            </section>
                        </div>
                        <div class="error-page-content wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <h2>MOHON MAAF!</h2>
                            <p>Halaman yang anda cari tidak ditemukan</p>
                            <a href="{{route('home')}}" class="filled-btn">
                                Kembali ke Beranda <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection