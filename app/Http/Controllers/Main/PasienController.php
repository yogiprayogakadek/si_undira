<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasienRequest;
use App\Models\Pasien;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    protected function data($request)
    {
        return [
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'nomor_rm' => $request->rm,
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
        return view('main.pasien.index');
    }

    public function render()
    {
        $currentDate2Years = new DateTime();
        $exactYearNumber = $currentDate2Years->sub(new DateInterval('P2Y'));
        $currentDate = new DateTime();

        $pasien = Pasien::all();
        $pasien = $pasien->map(function ($item) use($currentDate, $exactYearNumber, $currentDate2Years) {
            $kunjungan_terakhir = $item->kunjungan->last();
            if($kunjungan_terakhir != null) {
                $tanggal_kunjungan_terakhir = new DateTime($kunjungan_terakhir->tanggal_kunjungan);
                $days2Years = $exactYearNumber->diff($currentDate);

                $diffCurrentToLastDateDatabase = $currentDate->diff($tanggal_kunjungan_terakhir);

                // dd($diffCurrentToLastDateDatabase->days, $days2Years->days);

                $is_active = $diffCurrentToLastDateDatabase->days > $days2Years->days ? false : true;

                $item->is_active = $is_active;
                $item->save();
                // $item->update([
                //     'is_active' => $is_active
                // ]);
            }
            return $item;
        });

        $view = [
            'data' => view('main.pasien.render', compact('pasien'))->render()
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.pasien.create')->render()
        ];

        return response()->json($view);
    }

    public function store(PasienRequest $request)
    {
        try {
            $cekNIK = Pasien::where('nik', $request->nik)
                                ->where('is_active', true)->count();
            if ($cekNIK == 0) {
                Pasien::create($this->data($request));
                return response()->json($this->message('success'));
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Status pasien dengan NIK ' . $request->nik . ' masih aktif',
                    'title' => 'Info'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json($this->message('error'));
        }
    }

    public function edit($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);

        $view = [
            'data' => view('main.pasien.edit', compact('pasien'))->render()
        ];

        return response()->json($view);
    }

    public function update(PasienRequest $request)
    {
        try {
            $pasien = Pasien::find($request->pasien_id);
            $pasien->update($this->data($request));

            return response()->json($this->message('success'));
        } catch (\Exception $e) {
            return response()->json($this->message('error'));
        }
    }
}
