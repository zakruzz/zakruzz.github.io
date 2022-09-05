@extends('main.app')
@section('title', 'Checkout - ')

@section('style')
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
        .sidebar-checkout{
            background-color: #20bce5;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .img-item-cart{
            height: 70px;
            width: 100px;
            object-fit: cover;
        }
        .filled-btn.btn-bordered {
            background: transparent;
            border: 2px solid #ffffff;
            color: #ffffff;
        }

        .list{
            max-height: 350px!important;
            overflow-y: auto!important;
        }
    </style>
@endsection

@section('modal')
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
                                <h1>Checkout</h1>
                            </div>
                            <div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Beranda</a></li>
                                    <li><a href="{{route('merchandise.main')}}">Merchandise</a></li>
                                    <li class="active">Checkout</li>
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
                    <div class="col-lg-8">
                        <div class="section-title mb-40">
                            <h2>Detail Pengiriman</h2>
                        </div>
                        <div class="contact-respond">
                            <form>
                                <div class="input-group row">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="fullName" placeholder="Nama Lengkap..." name="name" required="">
                                        <label for="fullName">Nama :</label>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="phoneNumber" placeholder="Telepon Seluler..." name="phone" required="">
                                        <label for="phoneNumber">Telepon :</label>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <div class="col-lg-12">
                                        <input type="email" class="form-control" id="emailAddress" placeholder="Alamat Email..." name="email" required="">
                                        <label for="emailAddress">Email</label>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <div class="col-lg-4">
                                        <select class="form-control" name="province" onchange="changeCity(this);" required>
                                            <option value="" selected>- Provinsi -</option>
                                            @foreach($province as $result)
                                                <option value="{{$result['province_id']}}">{{$result['province']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="city" onchange="changeDistrict(this)" disabled required>
                                            <option value="" selected>- Kota -</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="district" disabled required>
                                            <option selected>- Kecamatan -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="subject" placeholder="Alamat Lengkap..." name="subject" required="">
                                        <label for="subject">Alamat :</label>
                                    </div>
                                </div>
                                <div class="input-group form-textarea row">
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="message" placeholder="Catatan Pesanan..." name="ctata"></textarea>
                                        <label for="message">Catatan :</label>
                                    </div>
                                </div>

                            </form>
                            <hr>
                            <div class="section-title mt-30 mb-40">
                                <h2>Pilihan Pembayaran</h2>
                            </div>
                            <form>
                                <div class="input-group row">
                                    <div class="col-lg-12">
                                        <select class="custom-select">
                                            <option selected>Jenis Pembayaran</option>
                                            <option value="1">Transfer Bank (BCA)</option>
                                            <option value="2">OVO</option>
                                            <option value="3">GOPAY</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="section-title mt-30 mb-40">
                                <h2>Pilihan Kurir</h2>
                            </div>
                            <form>
                                <div class="input-group row">
                                    <div class="col-lg-6">
                                        <select name="shipping_code" class="custom-select" onchange="changeCourier(this)">
                                            <option selected>Jenis Kurir</option>
                                            <option value="jne">One</option>
                                            <option value="sicepat">Two</option>
                                            <option value="jnt">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="shipping_type" class="custom-select" onchange="changeServiceCourier(this)">
                                            <option selected>Layanan</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- /.contact-respond -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-checkout">
                            <h3>Detail Pesanan</h3>
                            <hr>
                            <table class="w-100">
                                <tbody>
                                @if($cart)
                                    @foreach($cart as $result)
                                        <tr>
                                            <td style="width: 50%" class="text-truncate">{{$result['item_name']}}</td>
                                            <td style="width: 20%">{{$result['item_quantity']}}x</td>
                                            <td class="text-right" style="width: 30%">Rp. {{$result['item_total']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <hr>
                            <table class="w-100">
                                <tbody>
                                <tr>
                                    <td class="text-left w-50" style="width: 50%">Total Harga</td>
                                    <td class="text-right w-50">Rp. {{array_sum(array_column($cart, 'item_total'))}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left w-50" style="width: 50%">Pengiriman</td>
                                    <td class="text-right w-50">Rp. 15.000</td>
                                </tr>
                                <tr>
                                    <td class="text-left w-50">Subtotal</td>
                                    <td class="text-right w-50">Rp. 55.000</td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="input-group">
                                <button type="submit" class="filled-btn btn-bordered">Buat Pesanan <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">

        var authKey = "f0729595a08e6b03484d3d2c2b5c76a6";

        function changeCity(t) {
            $('.overlay').addClass('overlay-active');
            var a = $(t).val();
            "" != a ? $.ajax({
                url: "{{url('/api/raja-ongkir/city')}}/" + a,
                headers: { "Authorization": authKey },
                type: "GET",
                data: {},
                dataType: "JSON",
                success: function (t) {
                    $('.overlay').removeClass('overlay-active');
                    $("select[name='city']").html('<option value="">- Kota -</option>'), $.each(t, function (t, a) {
                        $("select[name='city']").append('<option value="' + a.city_id + '">' + a.city_name + "</option>")
                    }), $("select[name='city']").prop("disabled", !1)
                },
                error: function () {
                    $('.overlay').removeClass('overlay-active');
                    alert("Maaf ada kesalahan")
                }
            }) : $("select[name='city']").html('<option value="">- Kota -</option>').prop("disabled", 1)
        }

        function changeDistrict(t) {
            $('.overlay').addClass('overlay-active');
            var a = $(t).val();
            "" != a ? $.ajax({
                url: "{{url('/api/raja-ongkir/district')}}/" + a,
                headers: { "Authorization": authKey },
                type: "GET",
                data: {},
                dataType: "JSON",
                success: function (t) {
                    $('.overlay').removeClass('overlay-active');
                    $("select[name='district']").html('<option value="">- Kecamatan -</option>'), $.each(t, function (t, a) {
                        $("select[name='district']").append('<option value="' + a.subdistrict_id + '">' + a.subdistrict_name + "</option>")
                    }), $("select[name='district']").prop("disabled", !1)
                },
                error: function () {
                    $('.overlay').removeClass('overlay-active');
                    alert("Maaf ada kesalahan")
                }
            }) : $("select[name='district']").html('<option value="">- Kecamatan -</option>').prop("disabled", 1)
        }

        function changeCourier(t) {
            $('.overlay').addClass('overlay-active');
            var a           = $(t).val();
            let origin      = $("input[name=origin]").val();
            let destination = $("input[name=district]").val();
            let courier     = $("select[name=shipping_code]").val();
            let weight      = '1000';

            "" != a ?
                : alert("Maaf ada kesalahan")
            6153

        }

        $('select[name="courier"]').on('change', function(){
            $('.loading').show();
            let origin = $("input[name=origin]").val();
            let destination = $("input[name=destination]").val();
            let courier = $("select[name=courier]").val();
            let weight = @php echo array_sum(array_column($cart, 'item_weight')) @endphp;
            if(courier){
                $("select[name='service']").prop("disabled", false);
                jQuery.ajax({
                    url:"/check/cost/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        $('.loading').hide();
                        $('select[name="service"]').empty();
                        if(data[0].costs.length === 0){
                            $('select[name="service"]').append('<option>- Kurir Tidak Tersedia -</option>');
                        }else{
                            $('select[name="service"]').append('<option>- Pilih Paket -</option>');
                            $.each(data, function(key, value){
                                $.each(value.costs, function(key1, value1){
                                    $.each(value1.cost, function(key2, value2){
                                        $('select[name="service"]').append('<option value="'+ value1.service +'|'+ value2.value +'|'+ value2.etd +'">' + value1.service + ' - Estimasi : ' + value2.etd + ' ( Rp.' +value2.value+ ' )'+'</option>');
                                    });
                                });
                            });
                        }
                    }
                });
            } else {
                $('select[name="service"]').empty();
            }
        });


    </script>
@endsection
