<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use App\Models\Outcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suratMasuk = Incoming::where('tahun', Auth::user()->tahun)->get();
        $suratKeluar = Outcoming::where('tahun', Auth::user()->tahun)->get();
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
            "data" => Incoming::where('tahun', Auth::user()->tahun)->get()
        ];
        return view('app.surat.masuk.index', $data);
    }

    public function keluar()
    {
        $data = [
            "judul" => "List Surat Keluar",
            "data" => Outcoming::where('tahun', Auth::user()->tahun)->get()
        ];
        return view('app.surat.keluar.index', $data);
    }
}
