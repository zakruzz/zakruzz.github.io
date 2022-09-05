@extends('admin.app')

@section('title','Detail Tanggapan')

@section('style')
    @include('admin.assets.style.form')
@endsection

@section('content')
    <div id="loader"></div>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Tanggapan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.event-task.response.main')}}">Daftar Data</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail Data</li>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom p-1 mb-1">
                                        <div class="head-label">
                                            <h6 class="mb-0">Data Detail Penugasan <span class="badge badge-{{$data->status == 'MENUNGGU VERIFIKASI' ? 'warning' : 'secondary'}}">{{$data->status}}</span></h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="w-100" border="1">
                                            <tbody>
                                            <tr>
                                                <td class="w-25 p-2">
                                                    <span class="card-text  font-weight-bolder mb-0">Penugasan</span>
                                                </td>
                                                <td class="w-75 p-2">
                                                    <p class="card-text mb-0">: {{$data->task->title}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 p-2">
                                                    <span class="card-text  font-weight-bolder mb-0">Event</span>
                                                </td>
                                                <td class="w-75 p-2">
                                                    <p class="card-text mb-0">: {{$data->task->event->name}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 p-2">
                                                    <span class="card-text  font-weight-bolder mb-0">File Unggahan</span>
                                                </td>
                                                <td class="w-75 p-2">
                                                    <a href="{{route('admin.event-task.response.download', $data->id)}}" target="_blank" class="btn btn-primary">Download File</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom p-1 mb-1">
                                        <div class="head-label">
                                            <h6 class="mb-0">Data Detail Pengunggah</h6>
                                        </div>
                                    </div>
                                    <div class="card-body container row">
                                        <table class="w-100 col-lg-6">
                                            <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Nama</span>
                                                </td>
                                                <td class="w-50">
                                                    <p class="card-text mb-0">: {{$data->user->name}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50">
                                                    <i data-feather="mail" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Email</span>
                                                </td>
                                                <td class="w-50">
                                                    <p class="card-text mb-0">: {{$data->user->email}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">No Telp</span>
                                                </td>
                                                <td class="w-50">
                                                    <p class="card-text mb-0">: {{$data->user->phone}}</p>
                                                </td>
                                            </tr>
                                        </table>

                                        <table class="w-100 col-lg-6">
                                            <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    <i data-feather="star" class="mr-1"></i>
                                                    <span class="card-text user-info-title font-weight-bold mb-0">Sekolah</span>
                                                </td>
                                                <td class="w-50">
                                                    <p class="card-text mb-0">: {{$data->user->institution}}</p>
                                                </td>
                                            </tr>
                                            @if($data->team)
                                                <tr>
                                                    <td class="w-50">
                                                        <i data-feather="users" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Tim</span>
                                                    </td>
                                                    <td class="w-50">
                                                        <p class="card-text mb-0">: {{$data->team->name}}</p>
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button id="btn-approve" data-url="{{route('admin.event-task.response.updateStatus',[$data->id, 'DITERIMA'])}}" class="btn btn-success btn-block" {{$data->status == 'DITERIMA' ? 'disabled' : ''}}><i data-feather="thumbs-up"></i> Terima </button>
                                            </div>
                                            <div class="col-lg-4">
                                                <button id="btn-revision" data-url="{{route('admin.event-task.response.updateStatus',[$data->id, 'PERLU REVISI'])}}" class="btn btn-warning btn-block" {{$data->status == 'PERLU REVISI' ? 'disabled' : ''}}><i data-feather="clock"></i> Perlu Revisi </button>
                                            </div>
                                            <div class="col-lg-4">
                                                <button id="btn-decline" data-url="{{route('admin.event-task.response.updateStatus',[$data->id, 'DITOLAK'])}}" class="btn btn-danger btn-block" {{$data->status == 'DITOLAK' ? 'disabled' : ''}}><i data-feather="thumbs-down"></i> Tolak </button>
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
    </div>
@endsection

@section('script')
    @include('admin.assets.script.form')

    <script>
        $(document).on("click", "#btn-approve", function () {
            var url = $(this).data('url');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menyetujui penugasan ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((isConfirm) => {
                if (!isConfirm) return;
                $.ajax({
                    url: url,
                    method: "GET",
                    processData: false,
                    contentType: false,
                }).then((result) => {
                    $('#loader').css('display', 'none');
                    if (result.success) {
                        Swal.fire({
                            type: 'success',
                            title: 'Sukses!',
                            text: result.message,
                        }).then(function() {
                            location.reload();
                        });
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                    }
                });
            })
        });

        $(document).on("click", "#btn-revision", function () {
            var url = $(this).data('url');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk membuat status penugasan ini menjadi revisi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((isConfirm) => {
                if (!isConfirm) return;

                Swal.fire({
                    title: 'Alasan Revisi',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (form) => {
                        $.ajax({
                            url: url+`?reason=${form}`,
                            method: "GET",
                            processData: false,
                            contentType: false,
                        }).then((result) => {
                            $('#loader').css('display', 'none');
                            if (result.success) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Sukses!',
                                    text: result.message,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: result.message,
                                });
                            }
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            })
        })

        $(document).on("click", "#btn-decline", function () {
            var url = $(this).data('url');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Untuk menolak penugasan ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((isConfirm) => {
                if (!isConfirm) return;

                Swal.fire({
                    title: 'Alasan Penolakan',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: (form) => {
                        $.ajax({
                            url: url+`?reason=${form}`,
                            method: "GET",
                            processData: false,
                            contentType: false,
                        }).then((result) => {
                            $('#loader').css('display', 'none');
                            if (result.success) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Sukses!',
                                    text: result.message,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: result.message,
                                });
                            }
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            })
        });
    </script>
@endsection
