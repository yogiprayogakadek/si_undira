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
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'nomor_rm' => $request->rm,
            'kecamatan' => $request->kecamatan,
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

    public function kecamatan()
    {
        $kecamatan = [
            'Baturiti', 'Kediri', 'Kerambitan', 'Marga', 'Penebel', 'Pupuan', 'Selemadeg', 'Selemadeg Barat', 'Selemadeg Timur', 'Tabanan'
        ];

        return $kecamatan;
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
        $pasien = $pasien->map(function ($item) use($currentDate, $exactYearNumber) {
            $kunjungan_terakhir = $item->kunjungan->last();

            if($kunjungan_terakhir != null) {
                $tanggal_kunjungan_terakhir = new DateTime($kunjungan_terakhir->tanggal_kunjungan);
                $days2Years = $exactYearNumber->diff($currentDate);

                $diffCurrentToLastDateDatabase = $currentDate->diff($tanggal_kunjungan_terakhir);

                $is_active = $diffCurrentToLastDateDatabase->days > $days2Years->days ? false : true;
                $item->is_active = $is_active;
                $item->save();
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
            'data' => view('main.pasien.create')->with([
                'kecamatan' => $this->kecamatan()
            ])->render()
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
            return response()->json([
                'status' => 'error',
                'title' => 'error',
                'message' => $e->getMessage()
            ]);
            // return response()->json($this->message('error'));
        }
    }

    public function edit($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);

        $view = [
            'data' => view('main.pasien.edit')->with([
                'pasien' => $pasien,
                'kecamatan' => $this->kecamatan()
            ])->render()
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
