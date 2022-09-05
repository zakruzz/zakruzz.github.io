<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="author" content="Teknik Instrumentasi ITS">
    <title>Testimonial Instrumentation Festival</title>
    <link rel="apple-touch-icon" href="{{asset('storage/images/logo/'.$config->icon)}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/images/logo/'.$config->icon)}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/pages/page-auth.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">

    <style>
        .logo-login{
            border-right: 1px solid lightgray;
        }

        .brand-logo{
            margin: unset!important;
        }

        @media (max-width: 992px) {
            .logo-login{
                border-right: none;
                margin-bottom: 20px;
            }
        }
    </style>

</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <!-- Login v1 -->
                    <div class="card mb-0">
                        <div class="card-body row">
                            <div class="col-lg-4">
                                <a href="javascript:void(0);" class="brand-logo logo-login">
                                    <img width="80" src="{{asset('storage/images/logo/'.$config->logo)}}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <h4 class="card-title mb-1">Selamat Datang! 👋</h4>
                                <p class="card-text">Silahkan untuk mengisi testimonial dari acara INFEST</p>
                            </div>
                            <div class="col-lg-12">
                                <form class="auth-login-form mt-2" action="{{route('testimonialPost', $data->token)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name-testimonial" class="form-label">Nama Lengkap (Beserta Gelar) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name-testimonial" name="fullname" placeholder="Masukkan nama lengkap anda..."  autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label for="institution-testimonial" class="form-label">Dari Institusi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="institution-testimonial" name="institution" placeholder="Masukkan institusi anda..."  autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label for="job_position-testimonial" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="job_position-testimonial" name="job_position" placeholder="Masukkan jabatan anda..."  autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonial-testimonial" class="form-label">Testimoni <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="testimonial-testimonial" name="testimonial" placeholder="Masukkan kesan dan pesan anda tentang acara INFEST..."  autofocus required ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image-testimonial" class="form-label">Foto Profil (Opsional)</label>
                                        <input type="file" class="form-control" id="image-testimonial" name="image" placeholder="Masukkan foto profil anda..." accept="/*image"  autofocus />
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit" tabindex="4">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login v1 -->
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}"></script>

<script src="{{asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/js/core/app.js')}}"></script>

<script src="{{asset('admin-assets/app-assets/js/scripts/pages/page-auth-login.js')}}"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>
