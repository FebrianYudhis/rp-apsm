<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use App\Models\Outcoming;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suratMasuk = Incoming::get();
        $suratKeluar = Outcoming::get();
        $data = [
            "judul" => "Beranda",
            "suratMasuk" => $suratMasuk->count(),
            "suratKeluar" => $suratKeluar->count()
        ];
        return view('app.index', $data);
    }

    public function masuk()
    {
        $data = [
            "judul" => "List Surat Masuk",
            "data" => Incoming::all()
        ];
        return view('app.surat.masuk.index', $data);
    }

    public function keluar()
    {
        $data = [
            "judul" => "List Surat Keluar",
            "data" => Outcoming::all()
        ];
        return view('app.surat.keluar.index', $data);
    }
}
