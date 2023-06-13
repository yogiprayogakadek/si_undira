<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\KunjunganRequest;
use App\Models\Kunjungan;
use App\Models\Pasien;
use DateTime;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    protected function data($request)
    {
        $data = [
            'pasien_id' => $request->pasien_id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'diagnosa' => $request->diagnosa,
            'layanan' => $request->layanan,
            'jaminan' => $request->jaminan,
        ];

        // $extension = $request->file('jaminan')->getClientOriginalExtension();
        //     $filenamestore = $request->nik . '-' . time() . '.' . $extension;
        //     $save_path = 'assets/uploads/jaminan';

        //     if(!file_exists($save_path)) {
        //         mkdir($save_path, 0777, true);
        //     }

        //     $request->file('jaminan')->move($save_path, $filenamestore);

        return $data;
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
            // $extension = $request->file('jaminan')->getClientOriginalExtension();
            // $filenamestore = $request->nik . '-' . time() . '.' . $extension;
            // $save_path = 'assets/uploads/jaminan';

            // if(!file_exists($save_path)) {
            //     mkdir($save_path, 0777, true);
            // }

            // $request->file('jaminan')->move($save_path, $filenamestore);

            // dd($this->data($request->merge(['jaminan' => $save_path . '/' . $filenamestore])));


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

        $currentDate = new DateTime();
        $tanggal_lahir = new DateTime($pasien->tanggal_lahir);
        $interval = $tanggal_lahir->diff($currentDate);

        $pasien['umur'] = $interval->y . ' tahun';

        return response()->json($pasien);
    }
}
