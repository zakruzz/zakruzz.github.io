@extends('admin.app')

@section('title','Daftar Slider')

@section('style')
    @include('admin.assets.style.datatable')
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
                            <h2 class="content-header-title float-left mb-0">Slider</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Daftar Data</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <section class="col-lg-12" id="complex-header-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom p-1">
                                        <div class="head-label">
                                            <h6 class="mb-0">Daftar Slider</h6>
                                        </div>
                                        <div class="dt-action-buttons text-right">
                                            <div class="dt-buttons d-inline-flex">
                                                <a href="{{route('admin.slider.create')}}" class="btn btn-primary">
                                                    <span><i class="font-weight-bold" data-feather="plus"></i> Tambah Data</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-standard table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th class="text-center cl-num">No</th>
                                                <th class="d-lg-table-cell cl-primary">Judul</th>
                                                <th class="d-md-table-cell text-center">Tautan Pengalihan</th>
                                                <th class="d-md-table-cell text-center cl-image">Gambar</th>
                                                <th class="d-sm-table-cell text-center">Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $result)
                                                <tr>
                                                    <td class="text-center">{{$key + 1}}</td>
                                                    <td class="font-w600 text-truncate">{{$result->title}}</td>
                                                    <td class="d-md-table-cell text-truncate">{{$result->redirect_to}}</td>
                                                    <td class="d-md-table-cell text-center">
                                                        <img class="dt-img-preview" src="{{asset('storage/images/slider/'.$result->image)}}" alt="Gambar Slider">
                                                    </td>
                                                    <td class="d-sm-table-cell text-center">
                                                        <a href="{{route('admin.slider.edit',$result->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Sunting Data">
                                                            <i data-feather="edit-3"></i>
                                                        </a>
                                                        <button id="btn-remove" class="btn btn-sm btn-danger" data-url="{{route('admin.slider.delete',$result->id)}}" data-toggle="tooltip" title="Hapus Data">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
    @include('admin.assets.script.datatable')
@endsection
