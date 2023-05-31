<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RetensiController extends Controller
{
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
