<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\KunjunganRequest;
use App\Models\Kunjungan;
use App\Models\Pasien;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    protected function data($request)
    {
        return [
            'pasien_id' => $request->pasien_id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'ringkasan_kondisi_pasien' => $request->ringkasan,
        ];
    }

    protected function message($status)
    {
        $message = $status == 'success' ? 'Data berhasil disimpan' : 'Terjadi kesalahan';
        $title = $status == 'success' ? 'Berhasil' : 'Gagal';

        return [
            'status' => $status,
            'message' => $message,
            'title' => $title
        ];
    }

    public function index()
    {
        return view('main.kunjungan.index');
    }

    public function render()
    {
        $kunjungan = Kunjungan::all();

        $view = [
            'data' => view('main.kunjungan.render', compact('kunjungan'))->render()
        ];

        return response()->json($view);
    }

    public function create()
    {
        $pasien = Pasien::where('is_active', true)->pluck('nama', 'id')->prepend('Pilih nama pasien...', '')->toArray();
        $view = [
            'data' => view('main.kunjungan.create', compact('pasien'))->render()
        ];

        return response()->json($view);
    }

    public function store(KunjunganRequest $request)
    {
        try {
            Kunjungan::create($this->data($request));

            return response()->json($this->message('success'));
        } catch (\Exception $e) {
            return response()->json($this->message('error'));
        }
    }

    public function edit($kunjungan_id)
    {
        $kunjungan = Kunjungan::find($kunjungan_id);
        $pasien = Pasien::where('is_active', true)->pluck('nama', 'id')->prepend('Pilih nama pasien...', '')->toArray();
        $view = [
            'data' => view('main.kunjungan.edit', compact('kunjungan', 'pasien'))->render()
        ];

        return response()->json($view);
    }

    public function update(KunjunganRequest $request)
    {
        try {
            $kunjungan = Kunjungan::find($request->kunjungan_id);
            $kunjungan->update($this->data($request));

            return response()->json($this->message('success'));
        } catch (\Exception $e) {
            return response()->json($this->message('error'));
        }
    }

    public function dataPasien($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);

        return response()->json($pasien);
    }
}
