@extends('admin.app')

@section('title','Daftar Admin')

@section('style')
    @include('admin.assets.style.datatable')
@endsection

@section('modal')
    <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-fadein"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-data" action="{{route('admin.admin.store')}}" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">Tambah Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3" for="select-input">Role Admin<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control" id="select-input" name="role" required>
                                    <option>- Choose a Role -</option>
                                    <option value="superadmin">SuperAdmin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3" for="field-title">Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="field-title" name="name"
                                           placeholder="Name..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3" for="field-title">Email<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="field-title" name="email"
                                           placeholder="Email Address..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3" for="field-title">password<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="field-pass" name="password"
                                           placeholder="Password..." required>
                                </div>
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            <h2 class="content-header-title float-left mb-0">Admin</h2>
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
                                    <div class="card-header border-bottom p-1">
                                        <div class="head-label">
                                            <h6 class="mb-0">Daftar Admin</h6>
                                        </div>
                                        <div class="dt-action-buttons text-right">
                                            <div class="dt-buttons d-inline-flex">
                                                <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modal-fadein"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                        Tambah Admin</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-standard table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th class="text-center cl-num">No</th>
                                                <th class="d-lg-table-cell cl-primary">Nama</th>
                                                <th class="d-sm-table-cell text-center">Email</th>
                                                <th class="d-sm-table-cell text-center">Role</th>
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
                                                    <td class="d-sm-table-cell text-center"><span class="badge badge-primary">Superadmin</span></td>
                                                    <td class="d-sm-table-cell text-center">{{$result->last_login_at}}</td>
                                                    <td class="d-sm-table-cell text-center">{{$result->last_login_ip}}</td>
                                                    <td class="d-sm-table-cell text-center">
                                                        @if($result->id != auth()->user()->id)
                                                            <button id="btn-remove" class="btn btn-sm btn-danger" data-url="{{route('admin.admin.delete',$result->id)}}" data-toggle="tooltip" title="Delete">
                                                                Hapus
                                                            </button>
                                                        @else
                                                            <span class="cursor-pointer badge badge-warning" data-toggle="tooltip" data-placement="top" title="Anda sedang login menggunakan akun ini">
                                                                <i data-feather="alert-circle"></i>
                                                            </span>
                                                        @endif
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
    <script>
        function myFunction() {
            var x = document.getElementById("field-pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@endsection
