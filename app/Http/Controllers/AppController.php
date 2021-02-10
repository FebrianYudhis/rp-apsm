<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
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
        $suratKeluar = Incoming::get();
        $data = [
            "judul" => "Beranda",
            "suratMasuk" => $suratMasuk->count(),
            "suratKeluar" => $suratKeluar->count()
        ];
        return view('app.index', $data);
    }
}
