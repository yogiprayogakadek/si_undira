<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class RetensiController extends Controller
{
    public function __construct()
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
    }
    public function aktif()
    {
        $retensi = Pasien::where('is_active', true)->get();
        return view('main.retensi.aktif', compact('retensi'));
    }

    public function tidakAktif()
    {
        $retensi = Pasien::where('is_active', false)->get();
        return view('main.retensi.tidak-aktif', compact('retensi'));
    }
}
