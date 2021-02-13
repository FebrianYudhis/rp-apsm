<?php

namespace App\Http\Controllers\Surat;

use App\Models\Incoming;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    public function tambah()
    {
        $data = [
            "judul" => "Tambah Surat Masuk"
        ];
        return view('app.surat.masuk.tambah', $data);
    }

    public function store()
    {
        request()->validate([
            'nomorAgenda' => 'required',
            'tanggalDiterima' => 'required|date',
            'nomorSurat' => 'required',
            'pengirim' => 'required',
            'tanggalSurat' => 'required|date',
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'required|file|mimes:pdf'
        ]);

        $dokumen = request()->file('berkas')->store('dokumen/masuk');

        $masukkan = Incoming::create([
            'nomor_agenda' => request('nomorAgenda'),
            'tanggal_diterima' => request('tanggalDiterima'),
            'nomor_surat' => request('nomorSurat'),
            'pengirim' => request('pengirim'),
            'tanggal_surat' => request('tanggalSurat'),
            'perihal' => request('perihal'),
            'lokasi_berkas' => request('lokasiBerkas'),
            'url' => $dokumen
        ]);

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Masuk Berhasil Ditambahkan');
            return redirect()->route('surat.masuk');
        } else {
            Alert::error('Gagal', 'Surat Masuk Gagal Ditambahkan');
            return redirect()->route('surat.masuk');
        }
    }
}
