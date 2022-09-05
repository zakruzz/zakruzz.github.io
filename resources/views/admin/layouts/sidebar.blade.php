<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <span class="brand-logo">
                        <img src="{{asset('storage/images/logo/'.$config->logo)}}" alt="">
                    </span>
                    <h2 class="brand-text"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{Request::is('admin/dashboard') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.dashboard.main')}}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Dashboard</span>
                </a>
            </li>
            <li class="navigation-header active"><span data-i18n="Event">Event</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            <li class="nav-item has-sub menu-collapsed-open" style="">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Daftar Peserta">Daftar Peserta</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/inspection') ? 'active' : ''}}" href="{{route('admin.inspection.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Inpection">Inspection</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/inskill') ? 'active' : ''}}" href="{{route('admin.inskill.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Inskill">Inskill</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/instraining') ? 'active' : ''}}" href="{{route('admin.instraining.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Instraining">Instraining</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/intshow') ? 'active' : ''}}" href="{{route('admin.intshow.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Intshow">Intshow</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub" style="">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Penugasan">Penugasan</span>
                </a>
                <ul class="menu-content" style="">
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/task')  ? 'active' : ''}}" href="{{route('admin.event-task.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Daftar">Daftar</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center {{Request::is('admin/task/response') || Request::is('admin/task/response/*') ? 'active' : ''}}" href="{{route('admin.event-task.response.main')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>
                            <span class="menu-item text-truncate" data-i18n="Tanggapan">Tanggapan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="navigation-header active"><span data-i18n="Merchandise">Merchandise</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            </li>
            <li class="{{Request::is('admin/product') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.product.main')}}">
                    <i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Daftar Produk">Daftar Produk</span>
                </a>
            </li>
{{--            <li class="{{Request::is('admin/statistics/registration') ? 'active' : ''}} nav-item">--}}
{{--                <a class="d-flex align-items-center" href="{{route('admin.statistics.main')}}">--}}
{{--                    <i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Transaksi">Transaksi</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="navigation-header active"><span data-i18n="Data">Data</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            </li>
            <li class="{{Request::is('admin/slider') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.slider.main')}}">
                    <i data-feather="image"></i><span class="menu-title text-truncate" data-i18n="Slider">Slider</span>
                </a>
            </li>
            <li class="{{Request::is('admin/sponsor') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.sponsor.main')}}">
                    <i data-feather="briefcase"></i><span class="menu-title text-truncate" data-i18n="Sponsor">Sponsor</span>
                </a>
            </li>
            <li class="{{Request::is('admin/testimonial') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.testimonial.main')}}">
                    <i data-feather="star"></i><span class="menu-title text-truncate" data-i18n="Testimonial">Testimonial</span>
                </a>
            </li>
            <li class="{{Request::is('admin/statistics/registration') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.statistics.main')}}">
                    <i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Transaksi">Sertifikat</span>
                </a>
            </li>
            <li class="{{Request::is('admin/statistics/registration') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.statistics.main')}}">
                    <i data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Kirim Notifikasi">Kirim Notifikasi</span>
                </a>
            </li>
            <li class="navigation-header active"><span data-i18n="Statistik">Statistik</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            </li>
            <li class="{{Request::is('admin/statistics/registration') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.statistics.main')}}">
                    <i data-feather="pie-chart"></i><span class="menu-title text-truncate" data-i18n="Peserta">Peserta</span>
                </a>
            </li>
            <li class="{{Request::is('admin/statistics') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.statistics.main')}}">
                    <i data-feather="bar-chart-2"></i><span class="menu-title text-truncate" data-i18n="Pengunjung">Pengunjung</span>
                </a>
            </li>
            <li class="navigation-header active"><span data-i18n="Konfigurasi">Konfigurasi</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
            </li>
            <li class="{{Request::is('admin/configuration') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.config.main')}}">
                    <i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Konfigurasi Website</span>
                </a>
            </li>
            <li class="{{Request::is('admin/user') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.user.main')}}">
                    <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">User</span>
                </a>
            </li>
            <li class="{{Request::is('admin/admin') ? 'active' : ''}} nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.admin.main')}}">
                    <i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Form Wizard">Admin</span>
                </a>
            </li>
        </ul>
    </div>
</div>
