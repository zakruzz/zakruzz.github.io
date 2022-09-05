@extends('user.app')

@section('title','Submission')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/pages/app-todo.css')}}">
    <style>
        .item-detail-submission{
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }
    </style>
    <style>
        #loader{
            display: none;
            width: 10%;
            height: 5px;
            background-image: linear-gradient(#ffee00, #ffc903);
            background-size: 100%;
            background-repeat: no-repeat;
            position: fixed;
            top: 0;
            left:0;
            right:0;
            transition: width .1s ease-in;
            -moz-transition: width .1s ease-in;
            -ms-transition: width .1s ease-in;
            -o-transition: width .1s ease-in;
            -webkit-transition: width .1s ease-in;
            box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
            z-index: 99999;
        }

        /* Image by > https://samherbert.net/svg-loaders/ */

        #loader:after{
            content: "";
            width: 100%;
            height: 100%;
            background-color: rgb(0 0 0 / 50%);
            background-image: url("data:image/svg+xml,%3Csvg width='120' height='30' xmlns='http://www.w3.org/2000/svg' fill='%23fff'%3E%3Ccircle cx='15' cy='15' r='15'%3E%3Canimate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='60' cy='15' r='9' fill-opacity='.3'%3E%3Canimate attributeName='r' from='9' to='9' begin='0s' dur='0.8s' values='9;15;9' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='.5' to='.5' begin='0s' dur='0.8s' values='.5;1;.5' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='105' cy='15' r='15'%3E%3Canimate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 72px auto;
            position: fixed;
            backdrop-filter: blur(10px);
            bottom: 0;
            left: 0;
            right: 0;
            top: 5px;
            z-index: 9999999;
        }

        /*Don't worry about this*/
        /*Don't worry about this*/
        /*Don't worry about this*/
        body{
            margint:0;
            padding:0;
        }
        iframe {
            width: 100%;
            min-height: 1000px;
            border: 0;
            overflow: hidden;
        }
        /*Don't worry about this*/
        /*Don't worry about this*/
        /*Don't worry about this*/

    </style>
@endsection

@section('content')
    <div id="loader"></div>
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" disabled class="btn btn-primary btn-block" data-toggle="modal" data-target="#new-task-modal">
                                    Daftar Submission
                                </button>
                            </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters">
                                    <a href="{{route('user.task.main')}}" class="list-group-item list-group-item-action {{request()->is('user/task') ? 'active' : ''}}">
                                        <i data-feather="mail" class="font-medium-3 mr-50"></i>
                                        <span class="align-middle"> Tugas Saya</span>
                                    </a>
                                    <a href="{{route('user.task.completed')}}" class="list-group-item list-group-item-action {{request()->is('user/task/completed') ? 'active' : ''}}">
                                        <i data-feather="check" class="font-medium-3 mr-50"></i> <span class="align-middle">Telah Selesai</span>
                                    </a>
                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Penjelasan</h6>
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary mr-1"></span>Menunggu Verifikasi
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success mr-1"></span>Diterima
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-warning mr-1"></span>Revisi
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-danger mr-1"></span>Belum di Upload
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ml-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    @if($data->isEmpty())
                                        <li class="text-center">Tidak ada submission</li>
                                    @endif
                                    @foreach($data as $key => $result)
                                        @if(request()->is('user/task/completed'))
                                            @if(auth()->user()->checkApprovedTask($result->id))
                                                <li class="todo-item border border-bottom-accent-1">
                                                    <div class="todo-title-wrapper item-submission" data-detail="#detail-submission-{{$key}}">
                                                        <div class="todo-title-area">
                                                            <i data-feather="more-vertical"></i>
                                                            <div class="title-wrapper">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck10" disabled />
                                                                    <label class="custom-control-label" for="customCheck10"></label>
                                                                </div>
                                                                <span class="todo-title text-black-50 font-weight-bolder">{{$result->title}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-item-action">
                                                            <div class="badge-wrapper mr-1">
                                                                <div class="badge badge-pill badge-light-success">{{auth()->user()->checkTask($result->id)->status}}</div>
                                                                <div class="badge badge-pill badge-light-secondary" data-toggle="Tugas Bersifat {{$result->type}}">{{$result->type}}</div>
                                                            </div>
                                                            <small class="text-nowrap text-muted mr-1">SELESAI</small>
                                                        </div>
                                                    </div>
                                                    <div id="detail-submission-{{$key}}" class="container item-detail-submission d-none">
                                                        <div class="mt-2 border border-accent-1 p-2">
                                                            <h5>Detail Submision :</h5>
                                                            <div>{!! $result->description !!}</div>
                                                            <div class="mt-2 mb-2">File yang terunggah : <span class="badge badge-secondary">{{auth()->user()->checkTask($result->id)->file}}</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @else
                                            @if(auth()->user()->getMemberTeamInspection()->is_leader == 1 && $result->type == 'TIM')
                                                @if(!auth()->user()->checkApprovedTask($result->id))
                                                    <li class="todo-item border border-bottom-accent-1">
                                                        <div class="todo-title-wrapper item-submission" data-detail="#detail-submission-{{$key}}">
                                                            <div class="todo-title-area">
                                                                <i data-feather="more-vertical"></i>
                                                                <div class="title-wrapper">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" disabled />
                                                                        <label class="custom-control-label" for="customCheck10"></label>
                                                                    </div>
                                                                    <span class="todo-title text-black-50 font-weight-bolder">{{$result->title}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="todo-item-action">
                                                                <div class="badge-wrapper mr-1">
                                                                    <div class="badge badge-pill badge-light-warning">{{auth()->user()->checkTask($result->id) ? auth()->user()->checkTask($result->id)->status : 'BELUM DIUNGGAH'}}</div>
                                                                    <div class="badge badge-pill badge-light-secondary" data-toggle="Tugas Bersifat {{$result->type}}">{{$result->type}}</div>
                                                                    <div class="badge badge-pill badge-light-danger"><i data-feather="alert-circle"></i></div>
                                                                </div>
                                                                <small class="text-nowrap text-muted mr-1">Batas Pengumpulan {{\Carbon\Carbon::make($result->deadline)->isoFormat('dddd, D MMMM Y. HH:mm')}}</small>
                                                            </div>
                                                        </div>
                                                        <div id="detail-submission-{{$key}}" class="container item-detail-submission d-none">
                                                            <div class="mt-2 border border-accent-1 p-2">
                                                                <h5>Detail Submision :</h5>
                                                                <div>{!! $result->description !!}</div>
                                                                @if(auth()->user()->checkTask($result->id))
                                                                    <div class="mt-2 mb-2">File yang terunggah : <span class="badge badge-secondary">{{auth()->user()->checkTask($result->id)->file}}</span></div>
                                                                @endif
                                                                <form class="form-post" action="{{auth()->user()->checkTask($result->id) ? route('user.task.edit', auth()->user()->checkTask($result->id)->id) : route('user.task.store', $result->id)}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="customFile">Unggah File</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="file" id="customFile" required/>
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                        <span class="text-danger">*Maksimum file 100mb ( {{implode(',', $result->type_upload)}} )</span>
                                                                    </div>
                                                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @else
                                                @if(!auth()->user()->checkApprovedTask($result->id))
                                                    <li class="todo-item border border-bottom-accent-1">
                                                        <div class="todo-title-wrapper item-submission" data-detail="#detail-submission-{{$key}}">
                                                            <div class="todo-title-area">
                                                                <i data-feather="more-vertical"></i>
                                                                <div class="title-wrapper">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck10" disabled />
                                                                        <label class="custom-control-label" for="customCheck10"></label>
                                                                    </div>
                                                                    <span class="todo-title text-black-50 font-weight-bolder">{{$result->title}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="todo-item-action">
                                                                <div class="badge-wrapper mr-1">
                                                                    <div class="badge badge-pill badge-light-warning">{{auth()->user()->checkTask($result->id) ? auth()->user()->checkTask($result->id)->status : 'BELUM DIUNGGAH'}}</div>
                                                                    <div class="badge badge-pill badge-light-secondary" data-toggle="Tugas Bersifat {{$result->type}}">{{$result->type}}</div>
                                                                    <div class="badge badge-pill badge-light-danger"><i data-feather="alert-circle"></i></div>
                                                                </div>
                                                                <small class="text-nowrap text-muted mr-1">Batas Pengumpulan {{\Carbon\Carbon::make($result->deadline)->isoFormat('dddd, D MMMM Y. HH:mm')}}</small>
                                                            </div>
                                                        </div>
                                                        <div id="detail-submission-{{$key}}" class="container item-detail-submission d-none">
                                                            <div class="mt-2 border border-accent-1 p-2">
                                                                <h5>Detail Submision :</h5>
                                                                <div>{!! $result->description !!}</div>
                                                                @if(auth()->user()->checkTask($result->id))
                                                                    <div class="mt-2 mb-2">File yang terunggah : <span class="badge badge-secondary">{{auth()->user()->checkTask($result->id)->file}}</span></div>
                                                                @endif
                                                                <form class="form-post" action="{{auth()->user()->checkTask($result->id) ? route('user.task.edit', auth()->user()->checkTask($result->id)->id) : route('user.task.store', $result->id)}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="customFile">Unggah File</label>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="file" id="customFile" required/>
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                        <span class="text-danger">*Maksimum file 100mb ( {{implode(',', $result->type_upload)}} )</span>
                                                                    </div>
                                                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('admin-assets/app-assets/js/scripts/pages/app-todo.js')}}"></script>
    <script>
        $(document).on("click", ".item-submission", function () {
            var detail  = $(this).data('detail');

            $('.item-detail-submission').removeClass('d-block').addClass('d-none');

            $(`${detail}`).addClass('d-block');
        });

        $(document).on('submit', '.form-post', function(e) {
            e.preventDefault();

            $('#loader').css('display', 'block').animate({
                width:'90%'
            });

            let progressValue = 0;
            const progressBar = document.querySelector("#loader");

            progressBar.style.width = `${progressValue}%`;

            const timer = setInterval(() => {
                if (progressValue < 100) {
                    progressValue += 10;
                    progressBar.style.width = `${progressValue}%`;

                }
                if (progressValue === 100) {
                    clearInterval(timer);
                }
            }, 1000);

            $.ajax({
                url: $(".form-post").attr('action'),
                method: "POST",
                data: new FormData(this),
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
                        location.href = result.url;
                    });
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: result.message,
                    });
                }
            });
        });
    </script>
@endsection
