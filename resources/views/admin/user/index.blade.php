@extends('admin.app')

@section('title','Daftar User')

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
                            <h2 class="content-header-title float-left mb-0">User</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Daftar Akun</li>
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
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Daftar User</h4>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-standard table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th class="text-center cl-num">No</th>
                                                    <th class="d-lg-table-cell cl-primary">Nama</th>
                                                    <th class="d-sm-table-cell text-center">Email</th>
                                                    <th class="d-sm-table-cell text-center">Terakhir Login</th>
                                                    <th class="d-sm-table-cell text-center">Alamat IP Terakhir</th>
                                                    <th class="d-sm-table-cell text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $result)
                                                <tr>
                                                    <td class="text-center">{{$key + 1}}</td>
                                                    <td class="font-w600 text-truncate">{{$result->name}}</td>
                                                    <td class="d-sm-table-cell text-center">{{$result->email}}</td>
                                                    <td class="d-sm-table-cell text-center">{{$result->last_login_at}}</td>
                                                    <td class="d-sm-table-cell text-center">{{$result->last_login_ip}}</td>
                                                    <td class="d-sm-table-cell text-center">
                                                        <button id="btn-remove" class="btn btn-sm btn-danger" data-url="{{route('admin.user.delete',$result->id)}}" data-toggle="tooltip" title="Delete">
                                                            Hapus
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
