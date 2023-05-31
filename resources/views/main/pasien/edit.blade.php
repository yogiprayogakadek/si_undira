<div class="col-12">
    <form id="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Pasien
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="m-auto"></div>
                        <button type="button" class="btn btn-outline-primary btn-data">
                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" name="pasien_id" id="id" value="{{$pasien->id}}">
                <div class="form-group row">
                    <label for="nama" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nama Pasien
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama pasien" value="{{$pasien->nama}}">
                        <div class="invalid-feedback error-nama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="umur" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Umur
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control umur" name="umur" id="umur" placeholder="masukkan umur" value="{{$pasien->umur}}">
                        <div class="invalid-feedback error-umur"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis-kelamin" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jenis Kelamin
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select class="form-control jenis_kelamin" name="jenis_kelamin" id="jenis-kelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{$pasien->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan" {{$pasien->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        <div class="invalid-feedback error-jenis_kelamin"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Alamat
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control alamat" rows="8" name="alamat" id="alamat" placeholder="masukkan alamat">{{$pasien->alamat}}</textarea>
                        <div class="invalid-feedback error-alamat"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        NIK
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nik" name="nik" id="nik" placeholder="masukkan nik" value="{{$pasien->nik}}">
                        <div class="invalid-feedback error-nik"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rm" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nomor RM
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control rm" name="rm" id="rm" placeholder="masukkan rm" value="{{$pasien->nomor_rm}}">
                        <div class="invalid-feedback error-rm"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-update">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
