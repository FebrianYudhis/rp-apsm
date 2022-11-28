<?php

namespace App\Http\Controllers\Surat;

use App\Models\Outcoming;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'url' => $dokumen,
            'tahun' => Auth::user()->tahun,
        ]);

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Keluar Berhasil Ditambahkan');
            return redirect()->route('surat.keluar');
        } else {
            Alert::error('Gagal', 'Surat Keluar Gagal Ditambahkan');
            return redirect()->route('surat.keluar');
        }
    }

    public function hapus($id)
    {
        $surat = Outcoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.keluar');
        }
        $data = Outcoming::where('id', $id)->delete();
        if ($data) {
            Alert::success('Berhasil', 'Surat Keluar Berhasil Dihapus');
            return redirect()->route('surat.keluar');
        } else {
            Alert::error('Gagal', 'Surat Keluar Gagal Dihapus');
            return redirect()->route('surat.keluar');
        }
    }

    public function edit($id)
    {
        $surat = Outcoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.keluar');
        }
        $surat = Outcoming::where('id', $id)->first();
        $data = [
            "judul" => "Edit Surat Keluar",
            "data" => $surat
        ];
        return view('app.surat.keluar.edit', $data);
    }

    public function update($id)
    {
        $surat = Outcoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.keluar');
        }
        $surat = Outcoming::where('id', $id)->first();
        request()->validate([
            'tanggalSurat' => 'required|date',
            'nomorSurat' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'file|mimes:pdf'
        ]);

        if (request()->file('berkas')) {
            Storage::delete($surat['url']);
            $dokumen = request()->file('berkas')->store('dokumen/keluar');
        } else {
            $dokumen = $surat['url'];
        }

        $masukkan = Outcoming::find($surat['id']);
        $masukkan->tanggal_surat = request('tanggalSurat');
        $masukkan->nomor_surat = request('nomorSurat');
        $masukkan->tujuan = request('tujuan');
        $masukkan->perihal = request('perihal');
        $masukkan->lokasi_berkas = request('lokasiBerkas');
        $masukkan->url = $dokumen;
        $masukkan->save();

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Keluar Berhasil Diubah');
            return redirect()->route('surat.keluar');
        } else {
            Alert::error('Gagal', 'Surat Keluar Gagal Diubah');
            return redirect()->route('surat.keluar');
        }
    }
}
