<div class="col-12">
    <form id="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Kunjungan Pasien
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
                    <label for="pasien-id" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nama Pasien
                    </label>
                    <div class="col-lg-11 mt-2">
                        <select class="js-example-basic-single pasien_id" name="pasien_id" id="pasien-id">
                            @foreach ($pasien as $index => $item)
                            <option value="{{$index}}">{{$item}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback error-pasien_id"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="umur" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Umur
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control umur" name="umur" id="umur" placeholder="masukkan umur">
                        <div class="invalid-feedback error-umur"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
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
                <div class="form-group row hidden-input" hidden>
                    <label for="alamat" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Alamat
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control alamat" rows="8" name="alamat" id="alamat" placeholder="masukkan alamat"></textarea>
                        <div class="invalid-feedback error-alamat"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="nik" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        NIK
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control nik" name="nik" id="nik" placeholder="masukkan nik">
                        <div class="invalid-feedback error-nik"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="rm" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Nomor RM
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control rm" name="rm" id="rm" placeholder="masukkan rm">
                        <div class="invalid-feedback error-rm"></div>
                    </div>
                </div>

                <div class="form-group row hidden-input" hidden>
                    <label for="tanggal-kunjungan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Tanggal Kunjungan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="date" class="form-control tanggal_kunjungan" name="tanggal_kunjungan" id="tanggal-kunjungan" placeholder="masukkan tanggal kunjungan">
                        <div class="invalid-feedback error-tanggal_kunjungan"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="diagnosa" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Diagnosa
                    </label>
                    <div class="col-lg-11 mt-2">
                        <textarea class="form-control diagnosa" rows="8" name="diagnosa" id="diagnosa" placeholder="masukkan diagnosa pasien"></textarea>
                        <div class="invalid-feedback error-diagnosa"></div>
                    </div>
                </div>
                {{-- <div class="form-group row hidden-input" hidden>
                    <label for="jaminan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jaminan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="file" class="form-control jaminan" name="jaminan" id="jaminan" placeholder="masukkan jaminan">
                        <div class="invalid-feedback error-jaminan"></div>
                    </div>
                </div> --}}
                <div class="form-group row hidden-input" hidden>
                    <label for="jaminan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Jaminan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control jaminan" name="jaminan" id="jaminan" placeholder="masukkan jaminan">
                        <div class="invalid-feedback error-jaminan"></div>
                    </div>
                </div>
                <div class="form-group row hidden-input" hidden>
                    <label for="layanan" class="ul-form__label ul-form--margin col-lg-1   col-form-label ">
                        Layanan
                    </label>
                    <div class="col-lg-11 mt-2">
                        <input type="text" class="form-control layanan" name="layanan" id="layanan" placeholder="masukkan layanan">
                        <div class="invalid-feedback error-layanan"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-save" disabled>Simpan</button>
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
