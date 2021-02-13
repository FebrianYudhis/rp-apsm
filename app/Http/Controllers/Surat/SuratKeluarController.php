<?php

namespace App\Http\Controllers\Surat;

use App\Models\Outcoming;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{

    public function tambah()
    {
        $data = [
            "judul" => "Tambah Surat Keluar"
        ];
        return view('app.surat.keluar.tambah', $data);
    }

    public function store()
    {
        request()->validate([
            'tanggalSurat' => 'required|date',
            'nomorSurat' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'required|file|mimes:pdf'
        ]);

        $dokumen = request()->file('berkas')->store('dokumen/keluar');

        $masukkan = Outcoming::create([
            'tanggal_surat' => request('tanggalSurat'),
            'nomor_surat' => request('nomorSurat'),
            'tujuan' => request('tujuan'),
            'perihal' => request('perihal'),
            'lokasi_berkas' => request('lokasiBerkas'),
            'url' => $dokumen
        ]);

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Keluar Berhasil Ditambahkan');
            return redirect()->route('surat.keluar');
        } else {
            Alert::error('Gagal', 'Surat Keluar Gagal Ditambahkan');
            return redirect()->route('surat.keluar');
        }
    }
}
