@extends('main.app')
@section('title', 'Merchandise - ')

@section('style')
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .img-product{
            height: 250px;
            object-fit: cover;
        }
        .product-card-body{
            padding: 10px;
            margin: 10px;
        }
        .posts-sidebar{
            margin: 15px;
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
                                <h1>Merchandise</h1>
                            </div>
                            <div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Beranda</a></li>
                                    <li class="active">Merchandise</li>
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
                    <div class="col-lg-12 posts-sidebar">
                        <div class="widget search-widget wow fadeInUp row" data-wow-delay="0.1s" data-wow-duration="1200ms" style="border-radius: 10px">
                            <div class="col-lg-8 ">
                                <form action="{{route('merchandise.main')}}" method="GET">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cari Merchandise..." name="cari" value="{{$query}}">
                                        <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 text-center align-self-center">
                                <a href="{{route('merchandise.cart')}}" class="filled-btn bg-burning-orange mb-10"><i class="fas fa-shopping-cart"></i> Keranjang <span class="badge badge-light">{{$countCart}}</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($data->isEmpty())
                    <p class="text-center">Merchandise Tidak Ada :(</p>
                @endif
                <div class="row">
                    @foreach($data as $result)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                            <div class="single-team-member single-team-member-v2 wow fadeInUp shadow rounded" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="team-member-thumb">
                                    <img class="img-product" src="{{asset('storage/images/product/'.$result->image)}}" alt="team member one">
                                </div>
                                <div class="team-member-bio">
                                    <a href="{{route('merchandise.detail',$result->slug)}}" class="filled-btn bg-clear-blue mt-2">Lihat Detail</a>
                                </div>
                                <div class="product-card-body text-center">
                                    <h5 class="team-member-name">
                                        {{$result->name}}
                                    </h5>
                                    <p class="team-member-role">
                                        {{$result->priceFormat()}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$data->links()}}
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
