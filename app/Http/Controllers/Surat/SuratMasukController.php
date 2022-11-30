<?php

namespace App\Http\Controllers\Surat;

use App\Models\Incoming;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $cekAgenda = Incoming::where('nomor_agenda', request('nomorAgenda'))->where('tahun', Auth::user()->tahun)->get();
        if ($cekAgenda->count() > 0) {
            Alert::error('Gagal', 'Nomor Agenda Sudah Digunakan');
            return redirect()->route('masuk.tambah');
        }

        $dokumen = request()->file('berkas')->store('dokumen/masuk');

        $masukkan = Incoming::create([
            'nomor_agenda' => request('nomorAgenda'),
            'tanggal_diterima' => request('tanggalDiterima'),
            'nomor_surat' => request('nomorSurat'),
            'pengirim' => request('pengirim'),
            'tanggal_surat' => request('tanggalSurat'),
            'perihal' => request('perihal'),
            'lokasi_berkas' => request('lokasiBerkas'),
            'url' => $dokumen,
            'tahun' => Auth::user()->tahun
        ]);

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Masuk Berhasil Ditambahkan');
            return redirect()->route('surat.masuk');
        } else {
            Alert::error('Gagal', 'Surat Masuk Gagal Ditambahkan');
            return redirect()->route('surat.masuk');
        }
    }

    public function hapus($id)
    {
        $surat = Incoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.masuk');
        }

        $data = $surat->delete();
        if ($data) {
            Alert::success('Berhasil', 'Surat Masuk Berhasil Dihapus');
            return redirect()->route('surat.masuk');
        } else {
            Alert::error('Gagal', 'Surat Masuk Gagal Dihapus');
            return redirect()->route('surat.masuk');
        }
    }

    public function edit($id)
    {
        $surat = Incoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.masuk');
        }

        $data = [
            "judul" => "Edit Surat Masuk",
            "data" => $surat
        ];
        return view('app.surat.masuk.edit', $data);
    }

    public function update($id)
    {
        $surat = Incoming::find($id);
        if ($surat->tahun != Auth::user()->tahun) {
            Alert::error('Gagal', 'Anda Tidak Memiliki Akses');
            return redirect()->route('surat.masuk');
        }

        request()->validate([
            'nomorAgenda' => 'required',
            'tanggalDiterima' => 'required|date',
            'nomorSurat' => 'required',
            'pengirim' => 'required',
            'tanggalSurat' => 'required|date',
            'perihal' => 'required',
            'lokasiBerkas' => 'required',
            'berkas' => 'file|mimes:pdf'
        ]);

        $cekAgenda = Incoming::where('nomor_agenda', request('nomorAgenda'))->where('tahun', Auth::user()->tahun)->get();
        if ($cekAgenda->count() > 0 and $cekAgenda->first()->id != $id) {
            Alert::error('Gagal', 'Nomor Agenda Sudah Digunakan');
            return redirect()->route('masuk.edit', $id);
        }

        if (request()->file('berkas')) {
            Storage::delete($surat['url']);
            $dokumen = request()->file('berkas')->store('dokumen/masuk');
        } else {
            $dokumen = $surat['url'];
        }

        $masukkan = Incoming::find($surat['id']);
        $masukkan->nomor_agenda = request('nomorAgenda');
        $masukkan->tanggal_diterima = request('tanggalDiterima');
        $masukkan->nomor_surat = request('nomorSurat');
        $masukkan->pengirim = request('pengirim');
        $masukkan->tanggal_surat = request('tanggalSurat');
        $masukkan->perihal = request('perihal');
        $masukkan->lokasi_berkas = request('lokasiBerkas');
        $masukkan->url = $dokumen;
        $masukkan->save();

        if ($masukkan) {
            Alert::success('Berhasil', 'Surat Masuk Berhasil Diubah');
            return redirect()->route('surat.masuk');
        } else {
            Alert::error('Gagal', 'Surat Masuk Gagal Diubah');
            return redirect()->route('surat.masuk');
        }
    }
}
