<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendaftaran {{$data->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body contact-respond">
                <form id="form-data" action="{{route('event.registration.store', $data->slug)}}" method="POST">
                    @csrf

                    @if($data->isInspection())
                        @auth
                            <p class="float-left">Nama Tim <span class="text-danger">*</span></p>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Tim..." name="name_team" value="{{old('name_team')}}" required="">
                                <label for="fullName">Nama Tim:</label>
                            </div>

                            <p class="float-left">Email <span class="text-danger">*</span></p>
                            <div class="input-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailAddress" placeholder="Masukkan Alamat Email Anda..." value="{{auth()->user()->email}} (Unchanged)" disabled required="">
                                <input type="hidden" name="email" value="{{auth()->user()->email}}">
                                <label for="emailAddress">Email :</label>
                                <span class="text-danger">*Email hanya dapat diganti pada pengaturan profil anda</span>
                            </div>

                            <p class="float-left">Asal Sekolah <span class="text-danger">*</span></p>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fromSchool" placeholder="Masukkan Asal Sekolah Anda..." name="school" value="{{auth()->user()->institution}}" required="">
                                <label for="fromSchool">Asal :</label>
                            </div>

                            <div class="section-add-member text-center mb-3">
                                <h6>Undang anggota timmu (Maks 2)</h6>

                                <div id="newMember"></div>
                                <button id="addMember" type="button" class="filled-btn bg-burning-orange mt-3">Tambah Anggota <i class="fa fa-plus"></i></button>
                            </div>
                        @endauth
                    @else
                        <p class="float-left">Nama Lengkap <span class="text-danger">*</span></p>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap Anda..." name="name" value="{{old('name')}}" required="">
                            <label for="fullName">Nama :</label>
                        </div>

                        <p class="float-left">Email <span class="text-danger">*</span></p>
                        <div class="input-group">
                            <input type="email" class="form-control" id="emailAddress" placeholder="Masukkan Alamat Email Anda..." name="email" value="{{old('email')}}" required="">
                            <label for="emailAddress">Email :</label>
                        </div>

                        <p class="float-left">Nomor Telepon <span class="text-danger">*</span></p>
                        <div class="input-group">
                            <input type="text" class="form-control" id="phoneNumber" placeholder="Masukkan Telepon Seluler Anda..." name="phone_number" value="{{old('phone')}}" required="">
                            <label for="phoneNumber">Telepon :</label>
                        </div>

                        <p class="float-left">Asal Institusi <span class="text-danger">*</span></p>
                        <div class="input-group">
                            <input type="text" class="form-control" id="fullName" placeholder="Masukkan Asal Institusi Anda..." name="institution" value="{{old('institution')}}" required="">
                            <label for="fullName">Institusi :</label>
                        </div>

                        <p class="float-left">Posisi Jabatan <span class="text-danger">*</span></p>
                        <div class="input-group row ml-0">
                            <select class="custom-select" name="position_id" required>
                                <option selected>- Jabatan -</option>
                                @foreach($position as $result)
                                    <option value="{{$result->id}}">{{$result->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    @endif

                    <button type="submit" name="submit" value="submit" class="filled-btn bg-clear-blue btn-block mt-2">Daftar</button>

                </form>
            </div>
        </div>
    </div>
</div>
