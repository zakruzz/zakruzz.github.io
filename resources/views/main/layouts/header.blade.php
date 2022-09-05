<header class="header-area header-v2">
    <div class="header-navigation">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-xl-3 col-lg-4 col-md-5 col-8">
                    <div class="site-branding-and-language-selection">
                        <div class="brand-logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('storage/images/logo/'.$config->logo)}}" alt="{{$config->name_website}}">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-3 col-md-1 col-2 text-center">
                    <div class="primary-menu">
                        <div class="nav-menu">
                            <div class="navbar-close">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>
                            <nav class="main-menu">
                                <ul>
                                    <li class="menu-item">
                                        <a href="{{route('home')}}" class="nav-link {{Request::is('/') ? 'active' : ''}}">Beranda</a>
                                    </li>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="#" class="nav-link {{Request::is('event/inspection-kti') || Request::is('event/inspection-gt') ? 'active' : ''}}">Income</a>
                                        <ul class="sub-menu">
                                            @foreach($event as $key => $result)
                                                @if($result->hasChildren())
                                                    <li>
                                                        <a href="{{route('event.detail',$result->slug)}}">{{$result->name}}</a>
                                                    </li>
                                                @else
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @foreach($event as $key => $result)
                                        @if(!$result->hasChildren())
                                            <li class="menu-item">
                                                <a href="{{route('event.detail',$result->slug)}}" class="nav-link {{Request::is('event/'.$result->slug) ? 'active' : ''}}">
                                                    {{$result->name}}
                                                </a>
                                            </li>
                                        @else
                                        @endif
                                    @endforeach
                                    <li class="menu-item">
                                        <a href="{{route('merchandise.main')}}" class="nav-link {{Request::is('merchandise/') ? 'active' : ''}}">Merchandise</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-5 col-md-6 col-2">
                    <div class="header-right">
                        <ul>
                            <li class="get-started-wrapper">
                                @auth
                                    <a href="{{route('user.dashboard.main')}}" class="filled-btn bg-burning-orange">
                                        {{auth()->user()->name}} <i class="fas fa-user"></i>
                                    </a>
                                @else
                                    <a href="{{route('login')}}" class="filled-btn bg-burning-orange">
                                        Login <i class="fas fa-user"></i>
                                    </a>
                                @endauth
                            </li>
                            <li>
                                <div class="menu-toggle">
                                    <div class="menu-overlay"></div>
                                    <div class="nav-toggle">
                                        <div class="navbar-toggler float-end">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
