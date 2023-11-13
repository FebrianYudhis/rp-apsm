<?php

namespace App\Http\Controllers;

use App\Models\Digital;
use App\Models\Incoming;
use App\Models\Outcoming;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $data = [
            'judul' => "Beranda",
            'suratMasuk' => Incoming::count(),
            'suratKeluar' => Outcoming::count(),
            'suratDigital' => Digital::count()
        ];
        return view('guest.index', $data);
    }

    public function masuk()
    {

    }

    public function keluar()
    {

    }

    public function digital()
    {

    }
}
