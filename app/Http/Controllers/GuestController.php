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
            "judul" => "Beranda",
            "suratMasuk" => Incoming::count(),
            "suratKeluar" => Outcoming::count(),
            "suratDigital" => Digital::count()
        ];
        return view('guest.index', $data);
    }

    public function masuk(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->get('pencarian');
            if ($data == null || $data == "") {
                return null;
            } else {
                return Incoming::where('nomor_surat', 'LIKE', '%' . $data . '%')->orwhere('pengirim', 'LIKE', '%' . $data . '%')->orwhere('perihal', 'LIKE', '%' . $data . '%')->orderBy('nomor_agenda', 'desc')->get();
            }
        }

        $data = [
            "judul" => "List Surat Masuk",
            "suratMasuk" => Incoming::orderBy('nomor_agenda', 'desc')->paginate(10)
        ];
        return view('guest.masuk', $data);
    }

    public function keluar()
    {

    }

    public function digital()
    {

    }
}
