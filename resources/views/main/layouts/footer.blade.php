<footer class="footer-area footer-area-v3">
    <div class="container">
        <div class="footer-area-internal border-bottom-purple">
            <div class="row">

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="single-footer-widget footer-text-widget">
                        <h5 class="widget-title">INFEST 2022</h5>
                        <p>INFEST (Instrumentation Festival) adalah big event dari Himpunan Mahasiswa Teknik Instrumentasi ITS.</p>
                        <div class="footer-social-links">
                            <ul>
                                <li><a target="_blank" href="https://www.instagram.com/infest.its/?hl=en"><i class="fab fa-instagram"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/channel/UCX-9XszYcJhM-mAxZmNLvNA"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="single-footer-widget">
                        <h5 class="widget-title">Event</h5>
                        <div class="footer-widget-menu">
                            <ul>
                                @foreach($event as $result)
                                    <li><a href="{{route('event.detail',$result->slug)}}">{{$result->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <div class="single-footer-widget">
                        <h5 class="widget-title">Lainnya</h5>
                        <div class="footer-widget-menu">
                            <ul>
                                <li><a href="{{route('about')}}">Tentang INFEST</a></li>
                                <li><a href="{{route('faq')}}">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                    <div class="single-footer-widget follow-on-widget">
                        <h5 class="widget-title">Hubungi Kami</h5>
                        <div class="footer-app-download">
                            <a href="https://www.instagram.com/infest.its/" target="_blank" class="filled-btn bg-instagram w-100 text-center button-radius">
                                See on Instagram <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" target="_blank" class="filled-btn bg-dark w-100 text-center button-radius">
                                Chat on Line <i class="fab fa-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area wow fadeInDown" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInDown;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-4">
                    <div class="footer-logo">
                        <img width="50" src="{{asset('storage/images/logo/'.$config->logo)}}" alt="footer logo">
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <div class="footer-copyright">
                        <p>© 2021 <a href="#">Copyright.</a> All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Using Landio. This Template Crafted by WebTend -->
</footer>
