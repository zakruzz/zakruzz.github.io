@extends('admin.app')

@section('title',Request::is('admin/product/create') ? 'Tambah Data Produk' : 'Sunting Data Produk')

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
                            <h2 class="content-header-title float-left mb-0">Produk</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.product.main')}}">Daftar Data</a>
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
                                            <h6 class="mb-0">{{Request::is('admin/product/create') ? 'Tambah' : 'Sunting'}} Data Produk</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{Request::is('admin/product/create') ? route('admin.product.store') : route('admin.product.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-name">Nama Produk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field-name" name="name" placeholder="ex: Gelas Kaca"
                                                               value="{{Request::is('admin/product/create') ? '' : $data->name}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-price">Harga Produk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="field-price" name="price" placeholder="ex: 1000"
                                                               value="{{Request::is('admin/product/create') ? '' : $data->price}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-stock">Stok Produk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field-stock" name="stock" placeholder="ex: 100"
                                                               value="{{Request::is('admin/product/create') ? '' : $data->stock}}" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">Item</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-stock">Berat Kotor Produk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field-stock" name="weight" placeholder="ex: 100"
                                                               value="{{Request::is('admin/product/create') ? '' : $data->weight}}" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">Gram</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-stock">Deskripsi Produk <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <textarea name="description" id="ckeditor" required>{{Request::is('admin/product/create') ? '' : $data->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-title">Upload Gambar <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" accept="image/png, image/jpg, image/jpeg" class="custom-file-input" id="imageInp">
                                                        <label class="custom-file-label" for="customFile">{{Request::is('admin/product/create') ? '' : $data->image}}</label>
                                                    </div>
                                                    <span class="text-danger">*Ukuran gambar maksimum 5MB (.png/.jpg/.jpeg)</span>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="img-upload-border">
                                                        <img id="image-upload" class="img-upload" src="{{Request::is('admin/product/create') ? asset('storage/images/default.jpg') : asset('storage/images/product/'.$data->image)}}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="status" value="1">

                                            <div class="float-left m-1">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                                <a href="{{route('admin.product.main')}}" class="btn btn-danger">cancel</a>
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
