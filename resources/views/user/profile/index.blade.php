@extends('user.app')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/pages/app-user.css')}}">
    <style rel="stylesheet" href="{{asset('assets/css/form-loader.css')}}"></style>
@endsection

@section('content')
    <div class="loading-overlay">
        <span class="fas fa-spinner fa-3x fa-spin"></span>
    </div>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="password-tab" data-toggle="tab" href="#password" aria-controls="password" role="tab" aria-selected="true">
                                        <i data-feather="user"></i><span class="d-none d-sm-block">Ganti Password</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    @if(auth()->user()->newAccount())
                                        <div class="alert alert-danger alert-validation-msg" role="alert">
                                            <div class="alert-body">
                                                <i data-feather="info" class="mr-50 align-middle"></i>
                                                <span>Mohon untuk segera lengkapi biodata anda </span>
                                            </div>
                                        </div>
                                    @endif
                                    <form id="form-data" action="{{route('user.profile.update')}}" method="POST" class="form-validate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nama Lengkap</label>
                                                    <input type="text" class="form-control" placeholder="Name" value="{{auth()->user()->name}}" name="name" id="name" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="{{auth()->user()->email}}" name="email" id="email" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="phone">Nomor Telepon</label>
                                                    <input type="number" class="form-control" placeholder="Nomor Telepon"  value="{{auth()->user()->phone_number}}" name="phone_number" id="phone" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="password" aria-labelledby="password-tab" role="tabpanel">
                                    <form id="form-data" action="{{route('user.profile.password')}}" method="POST" class="form-validate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password Baru</label>
                                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
                                                    <span class="text-danger">* Minimum 8 karakter </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password-confirm">Konfirmasi Password Baru</label>
                                                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirm" id="password-confirm" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                                    </form>
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
    <script type="text/javascript" src="{{asset('assets/js/form-loader.js')}}"></script>
    <script src="{{asset('admin-assets/app-assets/js/scripts/pages/app-user.js')}}"></script>
@endsection
