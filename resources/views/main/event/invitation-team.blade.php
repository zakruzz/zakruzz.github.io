@extends('main.app')
@section('title', 'Undangan - ')

@section('style')
    <style>
        .breadcrumb-area {
            padding: 20px 0 20px;
        }
    </style>

    <style rel="stylesheet" href="{{asset('assets/css/form-loader.css')}}"></style>
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
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.section-internal -->
        </div> <!-- /.container -->
    </section>

    <section class=" pt-40 pb-95">
        <div class="container">
            <div class="team-member-content">
                <div class="info-iconic-boxes">
                    <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="info-body">
                            <h5>Kompetisi Inspection 2022</h5>
                            <hr>
                        </div>
                        <div class="contact-respond">
                            <p>Anda diundang oleh  untuk dapat bergabung pada tim {{$data->team->name}}</p>
                            <form id="form-data" action="{{route('event.invitation.store', $token)}}" method="POST">
                                @csrf
                                <button type="submit" name="submit" value="submit" class="filled-btn bg-clear-blue btn-block mt-5">Terima Undangan</button>
                            </form>
                        </div> <!-- /.contact-respond -->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets/js/form-loader.js')}}"></script>
@endsection
