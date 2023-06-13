<div class="col-12">
    <form id="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Pasien
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
                <div class="form-group row">
                    <label for="nama" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nama Pasien
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama pasien">
                        <div class="invalid-feedback error-nama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal-lahir" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tanggal Lahir
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal-lahir" placeholder="masukkan tanggal lahir">
                        <div class="invalid-feedback error-tanggal_lahir"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis-kelamin" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jenis Kelamin
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select class="form-control jenis_kelamin" name="jenis_kelamin" id="jenis-kelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback error-jenis_kelamin"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Alamat
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control alamat" rows="8" name="alamat" id="alamat" placeholder="masukkan alamat"></textarea>
                        <div class="invalid-feedback error-alamat"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kecamatan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Kecamatan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select class="form-control kecamatan" name="kecamatan" id="kecamatan">
                            <option value="">Pilih kecamatan</option>
                            @foreach ($kecamatan as $kecamatan)
                                <option value="{{$kecamatan}}">{{$kecamatan}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-kecamatan"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        NIK
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nik" name="nik" id="nik" placeholder="masukkan nik">
                        <div class="invalid-feedback error-nik"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rm" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nomor RM
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control rm" name="rm" id="rm" placeholder="masukkan rm">
                        <div class="invalid-feedback error-rm"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-save">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
