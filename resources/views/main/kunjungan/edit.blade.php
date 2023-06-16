<div class="col-12">
    <form id="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Kunjungan Pasien <strong>{{$kunjungan->pasien->nama}}</strong>
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
                <input type="hidden" name="kunjungan_id" id="kunjungan_id" value="{{$kunjungan->id}}">
                <input type="hidden" name="pasien_id" id="pasien_id" value="{{$kunjungan->pasien_id}}">
                <div class="form-group row">
                    <label for="nama" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nama Pasien
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama pasien" disabled value="{{$kunjungan->pasien->nama}}">
                        <div class="invalid-feedback error-nama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="umur" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Umur
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control umur" name="umur" id="umur" placeholder="masukkan umur" disabled value="{{$kunjungan->pasien_umur}}">
                        <div class="invalid-feedback error-umur"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis-kelamin" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jenis Kelamin
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select class="form-control jenis_kelamin" name="jenis_kelamin" id="jenis-kelamin" disabled>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-Laki" {{$kunjungan->pasien->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan" {{$kunjungan->pasien->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        <div class="invalid-feedback error-jenis_kelamin"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Alamat
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control alamat" rows="8" name="alamat" id="alamat" disabled placeholder="masukkan alamat">{{$kunjungan->pasien->alamat}}</textarea>
                        <div class="invalid-feedback error-alamat"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        NIK
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nik" name="nik" id="nik" disabled placeholder="masukkan nik" value="{{$kunjungan->pasien->nik}}">
                        <div class="invalid-feedback error-nik"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rm" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nomor RM
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control rm" name="rm" id="rm" disabled placeholder="masukkan rm" value="{{$kunjungan->pasien->nomor_rm}}">
                        <div class="invalid-feedback error-rm"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal-kunjungan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tanggal Kunjungan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="date" class="form-control tanggal_kunjungan" name="tanggal_kunjungan" id="tanggal-kunjungan" placeholder="masukkan tanggal kunjungan" value="{{$kunjungan->tanggal_kunjungan}}">
                        <div class="invalid-feedback error-tanggal_kunjungan"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="diagnosa" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Diagnosa
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control diagnosa" rows="8" name="diagnosa" id="diagnosa" placeholder="masukkan diagnosa pasien">{{$kunjungan->diagnosa}}</textarea>
                        <div class="invalid-feedback error-diagnosa"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="jaminan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jaminan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control jaminan" name="jaminan" id="jaminan" placeholder="masukkan jaminan" value="{{$kunjungan->jaminan}}">
                        <div class="invalid-feedback error-jaminan"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="layanan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Layanan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control layanan" name="layanan" id="layanan" placeholder="masukkan layanan" value="{{$kunjungan->layanan}}">
                        <div class="invalid-feedback error-layanan"></div>
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

<script>
    $('.js-example-basic-single').select2();
    $('.select2-container').width("100%")
</script>
