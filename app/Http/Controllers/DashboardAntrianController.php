<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAntrianController extends Controller
{
    public function indexLayananBpkb()
    {
        return view('dashboard.antrian.bpkb');
    }

    public function indexLayananStnk()
    {
        return view('dashboard.antrian.stnk');
    }

    public function indexLayananPajakKendaraan()
    {
        return view('dashboard.antrian.pajak');
    }

    public function indexlAYANANUjiKendaraan()
    {
        return view('dashboard.antrian.uji');
    }
}
