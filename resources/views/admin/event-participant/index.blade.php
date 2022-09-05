@extends('admin.app')

@section('title',"Daftar Peserta $event")

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
                            <h2 class="content-header-title float-left mb-0">{{$event}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Daftar Peserta</li>
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
                                    <div class="">
                                        <table class="dt-export table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th >Nama Lengkap</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Asal Sekolah</th>
                                                <th class="text-center">Pelajar</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $result)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td>{{$result->user->name}}</td>
                                                    <td class="text-center">{{$result->user->email}}</td>
                                                    <td class="text-center">{{$result->user->institution}}</td>
                                                    <td class="text-center">{{$result->user->position}}</td>
                                                    <td class="text-center"></td>
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
