@extends('main.app')
@section('title', 'Keranjang - ')

@section('style')
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .item-cart{
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
        }
        .img-item-cart{
            height: 70px;
            width: 100px;
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
                                <h1>Keranjang</h1>
                            </div>
                            <div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Beranda</a></li>
                                    <li><a href="{{route('merchandise.main')}}">Merchandise</a></li>
                                    <li class="active">Keranjang</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.section-internal -->
        </div> <!-- /.container -->
    </section>

    <section class=" pt-40 pb-95">
        <div class="container">
            <div class="team-member-content">
                <div class="row">
                    <div class="col-lg-12 posts-sidebar pb-20">
                        <div class="widget search-widget wow fadeInUp row" data-wow-delay="0.1s" data-wow-duration="1200ms" style="border-radius: 10px">
                            <div class="col-lg-8">
                                <h4 style="margin-bottom: unset">Total Harga : Rp. {{$data ? array_sum(array_column($data, 'item_total')) : 0}} <br> <small>Jumlah Item : {{$data ? array_sum(array_column($data, 'item_quantity')) : 0}}</small></h4>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a href="{{route('merchandise.checkout')}}" class="filled-btn bg-burning-orange"> Checkout <i class="fas fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$data)
                    <p class="text-center">Keranjang anda masih kosong :(</p>
                @endif
                <div class="row mt-2">

                    @if($data)
                        @foreach($data as $result)
                            <div class="col-lg-12 mb-3">
                                <div class="item-cart row">
                                    <div class="col-lg-6 col-6 text-center">
                                        <img class="img-item-cart" src="{{asset('storage/images/product/'.$result['item_image'])}}" alt="">
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <h3 class="text-truncate">{{$result['item_name']}}</h3>
                                        <span>Rp. {{$result['item_price']}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <a class="btn btn-danger w-100 mt-4" href="{{route('merchandise.removeCart')}}">Hapus Keranjang</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>





@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        })
    </script>
@endsection
