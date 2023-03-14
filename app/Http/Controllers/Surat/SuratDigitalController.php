<?php

namespace App\Http\Controllers\Surat;

use App\Models\Digital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratDigitalController extends Controller
{
    public function tambah()
    {
        $data = [
            "judul" => "Tambah Surat Digital"
        ];
        return view('app.surat.digital.tambah', $data);
    }

    public function store()
    {
        request()->validate([
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'required|file|mimes:pdf'
        ]);

        $dokumen = request()->file('berkas')->store('dokumen/digital');

        $masukkan = Digital::create([
            'perihal' => request('perihal'),
            'lokasi_berkas' => request('lokasiBerkas'),
            'url' => $dokumen,
        ]);

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Digital Berhasil Ditambahkan');
            return redirect()->route('surat.digital');
        } else {
            Alert::error('Gagal', 'Surat Digital Gagal Ditambahkan');
            return redirect()->route('surat.digital');
        }
    }

    public function hapus($id)
    {
        $surat = Digital::find($id);

        $data = $surat->delete();
        if ($data) {
            Alert::success('Berhasil', 'Surat Digital Berhasil Dihapus');
            return redirect()->route('surat.digital');
        } else {
            Alert::error('Gagal', 'Surat Digital Gagal Dihapus');
            return redirect()->route('surat.digital');
        }
    }

    public function edit($id)
    {
        $surat = Digital::find($id);

        $data = [
            "judul" => "Edit Surat Digital",
            "data" => $surat
        ];
        return view('app.surat.digital.edit', $data);
    }

    public function update($id)
    {
        $surat = Digital::find($id);

        request()->validate([
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'file|mimes:pdf'
        ]);

        if (request()->file('berkas')) {
            Storage::delete($surat['url']);
            $dokumen = request()->file('berkas')->store('dokumen/digital');
        } else {
            $dokumen = $surat['url'];
        }

        $masukkan = Digital::find($surat['id']);
        $masukkan->perihal = request('perihal');
        $masukkan->lokasi_berkas = request('lokasiBerkas');
        $masukkan->url = $dokumen;
        $masukkan->save();

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Digital Berhasil Diubah');
            return redirect()->route('surat.digital');
        } else {
            Alert::error('Gagal', 'Surat Digital Gagal Diubah');
            return redirect()->route('surat.digital');
        }
    }
}
