<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah antrian berdasarkan periode waktu
        $hariIniAntri = Antrian::whereDate('created_at', Carbon::today())->count();
        $mingguIniAntri = Antrian::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $bulanIniAntri = Antrian::whereMonth('created_at', Carbon::now()->month)->count();
        $semuaAntri = Antrian::count();

        // Data untuk masing-masing layanan
        $bpkb = Antrian::where('layanan', 'bpkb')->where('is_call', false)->count();
        $stnk = Antrian::where('layanan', 'stnk')->where('is_call', false)->count();
        $pajak = Antrian::where('layanan', 'pajak')->where('is_call', false)->count();
        $uji = Antrian::where('layanan', 'uji')->where('is_call', false)->count();

        return view('dashboard.index', [
            'hariIniAntri'     => $hariIniAntri,
            'mingguIniAntri'   => $mingguIniAntri,
            'bulanIniAntri'    => $bulanIniAntri,
            'semuaAntri'       => $semuaAntri,
            'bpkb'             => $bpkb,
            'stnk'             => $stnk,
            'pajak'            => $pajak,
            'uji'              => $uji,
        ]);
    }
}

