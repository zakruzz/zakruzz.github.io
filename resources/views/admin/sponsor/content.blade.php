@extends('admin.app')

@section('title',Request::is('admin/sponsor/create') ? 'Tambah Data Sponsor' : 'Sunting Data Sponsor')

@section('style')
    @include('admin.assets.style.form')
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
                            <h2 class="content-header-title float-left mb-0">Sponsor</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.sponsor.main')}}">Daftar Data</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tambah Data</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <section class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom p-1 mb-1">
                                        <div class="head-label">
                                            <h6 class="mb-0">{{Request::is('admin/sponsor/create') ? 'Tambah' : 'Sunting'}} Data Sponsor</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{Request::is('admin/sponsor/create') ? route('admin.sponsor.store') : route('admin.sponsor.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-name">Nama Sponsor <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field-name" name="name" placeholder="ex: Kemdikbud"
                                                               value="{{Request::is('admin/sponsor/create') ? '' : $data->name}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-title">Upload Logo <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <div class="custom-file">
                                                        <input type="file" name="logo" accept="image/png, image/jpg, image/jpeg" class="custom-file-input" id="imageInp">
                                                        <label class="custom-file-label" for="customFile">{{Request::is('admin/sponsor/create') ? '' : $data->logo}}</label>
                                                    </div>
                                                    <span class="text-danger">*Ukuran gambar maksimum 5MB (.png/.jpg/.jpeg)</span>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="img-upload-border">
                                                        <img id="image-upload" class="img-upload" src="{{Request::is('admin/sponsor/create') ? asset('storage/images/default.jpg') : asset('storage/images/sponsor/'.$data->logo)}}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="float-left m-1">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                                <a href="{{route('admin.sponsor.main')}}" class="btn btn-danger">cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.assets.script.form')
@endsection
