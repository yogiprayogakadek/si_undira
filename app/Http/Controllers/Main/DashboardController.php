<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('main.dashboard.index');
    }

    public function chart()
    {
        $data = DB::table('pasien')
                ->select(DB::raw('pasien.is_active as label'), DB::raw('COUNT(*) as value'))
                ->groupBy('pasien.is_active')
                ->get();

        return response()->json($data);
    }
}
