<?php

namespace App\Http\Controllers\Dashboard\Guru;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Data\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::get();
        return view('dashboard.pages.data.guru.guru', compact('guru'));
    }

    public function store(Request $request)
    {
        $guru = Guru::create([
            'nip' => $request->nip,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'email' => $request->email,
            'hp' => $request->hp,
            // Alamat lengkap
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/guru');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $guru = Guru::findOrFail($id);

        // Lakukan proses update
        $guru->nip = $request->nip;
        $guru->nik = $request->nik;
        $guru->nama_lengkap = $request->nama_lengkap;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->tempat_lahir = $request->tempat_lahir;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->agama = $request->agama;
        $guru->email = $request->email;
        $guru->hp = $request->hp;
        $guru->alamat = $request->alamat;
        $guru->provinsi = $request->provinsi;
        $guru->kota_kabupaten = $request->kota_kabupaten;
        $guru->kecamatan = $request->kecamatan;
        $guru->kelurahan = $request->kelurahan;

        $guru->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/guru');
    }

    public function destroy($id)
    {
        $pendaftaran = Guru::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/guru');
    }
    public function exportExcel()
    {
        return Excel::download(new GuruExport, 'data-guru.xlsx');
    }
    public function importExcel(Request $request)
    {
        Excel::import(new GuruImport, $request->file('upload'));

        toast('Berhasil Import Data!!!', 'success');
        return redirect('/dashboard/guru');
    }
}
