@extends('admin.app')

@section('title',Request::is('admin/task/create') ? 'Tambah Data Penugasan' : 'Sunting Data Penugasan')

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
                            <h2 class="content-header-title float-left mb-0">Penugasan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.event-task.main')}}">Daftar Data</a>
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
                                            <h6 class="mb-0">{{Request::is('admin/task/create') ? 'Tambah' : 'Sunting'}} Data Penugasan</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form id="form-post" action="{{Request::is('admin/task/create') ? route('admin.event-task.store') : route('admin.event-task.update',$data->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-title">Judul Penugasan <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field-title" name="title" placeholder="ex: Penugasan Full Paper"
                                                               value="{{Request::is('admin/task/create') ? '' : $data->title}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-event">Untuk Event <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="event_id" id="field-event" required>
                                                        <option value="">- Pilih Event -</option>
                                                        @foreach($event as $result)
                                                            <option value="{{$result->id}}" {{Request::is('admin/task/create') ? '' : ( $data->event_id == $result->id ? 'selected' : '' )}}>{{$result->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-deadline">Deadline Penugasan <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <input type="datetime-local" class="form-control" id="field-deadline" name="deadline" placeholder="ex: Penugasan Full Paper"
                                                               value="{{Request::is('admin/task/create') ? '' : preg_replace("/\s/",'T',$data->deadline)}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-type-upload">Tipe Upload <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select class="select2 form-control" id="field-type-upload" name="type_upload[]" required multiple>
                                                        <optgroup label="File">
                                                            <option value="pdf" {{Request::is('admin/task/create') ? '' : ( in_array('pdf', $data->type_upload) ? 'selected' : '' )}}>PDF</option>
                                                            <option value="doc" {{Request::is('admin/task/create') ? '' : ( in_array('doc', $data->type_upload) ? 'selected' : '' )}}>DOC</option>
                                                            <option value="docx" {{Request::is('admin/task/create') ? '' : ( in_array('docx', $data->type_upload) ? 'selected' : '' )}}>DOCX</option>
                                                            <option value="zip" {{Request::is('admin/task/create') ? '' : ( in_array('zip', $data->type_upload) ? 'selected' : '' )}}>ZIP</option>
                                                            <option value="rar" {{Request::is('admin/task/create') ? '' : ( in_array('rar', $data->type_upload) ? 'selected' : '' )}}>RAR</option>
                                                        </optgroup>
                                                        <optgroup label="Gambar">
                                                            <option value="jpg" {{Request::is('admin/task/create') ? '' : ( in_array('jpg', $data->type_upload) ? 'selected' : '' )}}>JPG</option>
                                                            <option value="jpeg" {{Request::is('admin/task/create') ? '' : ( in_array('jpeg', $data->type_upload) ? 'selected' : '' )}}>JPEG</option>
                                                            <option value="png" {{Request::is('admin/task/create') ? '' : ( in_array('png', $data->type_upload) ? 'selected' : '' )}}>PNG</option>
                                                        </optgroup>
                                                        <optgroup label="Video">
                                                            <option value="mp4" {{Request::is('admin/task/create') ? '' : ( in_array('mp4', $data->type_upload) ? 'selected' : '' )}}>MP4</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-type">Tipe Penugasan <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="type" id="field-type" required>
                                                        <option value="">- Pilih Tipe Penugasan -</option>
                                                        <option value="TIM" {{Request::is('admin/task/create') ? '' : ( $data->type == 'TIM' ? 'selected' : '' )}}>TIM</option>
                                                        <option value="INDIVIDU" {{Request::is('admin/task/create') ? '' : ( $data->type == 'INDIVIDU' ? 'selected' : '' )}}>INDIVIDU</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-status">Status Penugasan <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="status" id="field-status" required>
                                                        <option value="">- Pilih Status Penugasan -</option>
                                                        <option value="AKTIF" {{Request::is('admin/task/create') ? '' : ( $data->status == 'AKTIF' ? 'selected' : '' )}}>AKTIF</option>
                                                        <option value="NONAKTIF" {{Request::is('admin/task/create') ? '' : ( $data->status == 'NONAKTIF' ? 'selected' : '' )}}>NONAKTIF</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3" for="field-desc">Deskripsi Penugasan <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <textarea name="description" id="ckeditor" required >{{Request::is('admin/task/create') ? '' : $data->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="float-left m-1">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                                <a href="{{route('admin.event-task.main')}}" class="btn btn-danger">cancel</a>
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
