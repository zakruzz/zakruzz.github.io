@extends('admin.app')

@section('title','Website Configuration')

@section('style')
    <style>
        .img-upload-border{
            border: 1px solid lightgray;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 25px;
            border-radius: 5px;
        }

        .img-upload{
            height: 80px;
        }
    </style>
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Konfigurasi Website</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Data</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-tabs-components">
                    <div class="row match-height">
                        <!-- Basic Tabs starts -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Konfigurasi Website</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Profil Website</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="meta-tab" data-toggle="tab" href="#meta" aria-controls="meta" role="tab" aria-selected="false">Meta Data</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                            <hr>
                                            <form id="form-data" action="{{route('admin.config.update')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Title <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="field-title" name="title"
                                                                   placeholder="Name of Website" value="{{$configuration->title_website}}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Email <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id="field-title" name="email"
                                                                   placeholder="example@email.com" value="{{$configuration->email}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Phone Number <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="field-title" name="phone"
                                                                   placeholder="ex: 62812xxxxxxxx" value="{{$configuration->phone_number}}"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Address <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <input type="text" id="address-input" name="address_address"
                                                               class="form-control map-input" value="{{$configuration->address_address}}">
                                                        <input type="hidden" name="address_latitude" id="address-latitude"
                                                               value="{{$configuration->address_latitude}}"/>
                                                        <input type="hidden" name="address_longitude" id="address-longitude"
                                                               value="{{$configuration->address_longitude}}"/>
{{--                                                        <br>--}}
{{--                                                        <div id="address-map-container" style="width:100%;height:400px; ">--}}
{{--                                                            <div style="width: 100%; height: 100%" id="address-map"></div>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Upload Logo <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="custom-file">
                                                            <input type="file" name="logo" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">{{$configuration->logo}}</label>
                                                        </div>
                                                        <span class="text-danger">*Ukuran gambar maksimum 1MB (.png)</span>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="img-upload-border">
                                                            <img id="logo-upload" class="img-upload" src="{{asset('storage/images/logo/'.$configuration->logo)}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Upload Logo (White Color) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="custom-file">
                                                            <input type="file" name="logo_white" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">{{$configuration->logo_white}}</label>
                                                        </div>
                                                        <span class="text-danger">*Ukuran gambar maksimum 1MB (.png)</span>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="img-upload-border">
                                                            <img id="logo-white-upload" class="img-upload" src="{{asset('storage/images/logo/'.$configuration->logo_white)}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="field-title">Upload Icon <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <div class="custom-file">
                                                            <input type="file" name="icon" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">{{$configuration->icon}}</label>
                                                        </div>
                                                        <span class="text-danger">*Ukuran gambar maksimum 1MB (.png)</span>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="img-upload-border">
                                                            <img id="icon-upload" class="img-upload" src="{{asset('storage/images/logo/'.$configuration->icon)}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="float-left" style="margin: 2%">
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                    <a href="" class="btn btn-danger">cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="meta" aria-labelledby="meta-tab" role="tabpanel">
                                            <span class="text-danger">* Digunakan Untuk Google Search Engine</span>
                                            <hr>
                                            <form id="form-data" action="{{route('admin.config.update-meta')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="js-ckeditor">Meta Keywords <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_keywords" rows="3" required>{{$configuration->meta_keywords}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3" for="js-ckeditor">Meta Description <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_description" rows="3" required>{{$configuration->meta_description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="float-left" style="margin: 2%">
                                                    <button type="submit" class="btn btn-primary">submit</button>
                                                    <a href="" class="btn btn-danger">cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>
    <script src="{{asset('superuser/assets/js/mapInput.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('superuser/assets/js/pages/be_tables_datatables.min.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/simplemde/simplemde.min.js')}}"></script>
    <script src="{{asset('superuser/assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>jQuery(function(){ Codebase.helpers(['ckeditor', 'select2']); });</script>
    <script src="{{asset('superuser/assets/js/pages/be_forms_plugins.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(document).on("click", "#btn-remove", function () {
            var url = $(this).data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't clear this data!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    ).then(function () {
                        location.href = url
                    })
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#logo-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logoInp").change(function () {
                readURL(this);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#logo-white-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logoWhiteInp").change(function () {
                readURL(this);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#icon-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#iconInp").change(function () {
                readURL(this);
            });
        });
    </script>
@endsection
