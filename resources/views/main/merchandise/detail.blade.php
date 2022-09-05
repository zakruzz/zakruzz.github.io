@extends('main.app')
@section('title', $data->name.' - ')

@section('style')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/js-socials/jssocials.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/js-socials/jssocials-theme-flat.css')}}" />
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .img-product{
            height: 250px;
            object-fit: cover;
        }
        .jssocials-share-link { border-radius: 50%; }

        .btn-counter{
            width: 10%;
            border-radius: unset!important;
        }

        .input-counter{
            border-radius: unset!important;
        }

    </style>
@endsection

@section('modal')
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk ke Keranjang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body contact-respond">
                    <form id="form-data" action="{{route('merchandise.addCart', $data->slug)}}" method="POST">
                        @csrf
                            <p class="float-left">Jumlah Produk <span class="text-danger">*</span></p>
                        <div class="input-group">
                            <button class="minus btn-counter"><i class="fa fa-minus"></i></button>
                            <input type="number" class="form-control text-center input-counter" name="quantity" value="1" required>
                            <button class="plus btn-counter"><i class="fa fa-plus"></i></button>
                        </div>
                        <button type="submit" name="submit" value="submit" class="filled-btn bg-clear-blue btn-block mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                            <div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Beranda</a></li>
                                    <li><a href="{{route('merchandise.main')}}">Merchandise</a></li>
                                    <li class="active">Detail</li>
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
                    <div class="col-lg-6">
                        <div class="post-thumbnail">
                            <img src="{{asset('storage/images/product/'.$data->image)}}" alt="blog thumbnail">
                        </div>
                        <div class="post-share mt-3">
                            <div class="social-links">
                                <div id="share"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="entry-content">
                            <h2>{{$data->name}}</h2>
                            <h4>{{$data->priceFormat()}} / Item </h4>
                            <p>Stok : {{$data->stock}} Item</p>
                            <hr>
                            <button type="button" data-toggle="modal" data-target="#addCartModal" class="filled-btn bg-clear-blue mt-2 mb-2"><i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang </button>
                            <hr>
                            <div>
                                <p>Deskripsi : </p>
                                {!! $data->description !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('assets/vendor/js-socials/jssocials.min.js')}}"></script>
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: [ "twitter", "facebook", "linkedin", "pinterest"]
        });
    </script>
    <script>
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        })

        $(document).ready(function() {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>
@endsection
