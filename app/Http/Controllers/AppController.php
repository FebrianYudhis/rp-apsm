<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use App\Models\Outcoming;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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

    public function masuk(Request $request)
    {
        if ($request->ajax()) {
            $query = Incoming::where('tahun', Auth::user()->tahun)->orderBy('nomor_agenda', 'desc')->get();
            return DataTables::of($query)
                ->addColumn('aksi', function ($data) {
                    $button = "<a href='" . asset('storage') . '/' . $data['url'] . "' target='_blank' class='btn btn-success col-md-12'>Lihat Berkas</a>";
                    $button = $button . "<a href='" . route('masuk.edit', [$data['id']]) . "' class='btn btn-primary col-md-12 mt-1'>Edit</a>";
                    $button = $button . "<form action='" . route('masuk.hapus', [$data['id']]) . "' class='mt-1 w-100 konfirmasi-hapus' method='POST'> " . csrf_field() . method_field('delete') . " <button type='submit' class='btn btn-danger w-100'>Hapus</button></form>";
                    return $button;
                })->rawColumns(['aksi'])->toJson();
        }

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
