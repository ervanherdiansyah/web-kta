<?php

namespace App\Http\Controllers\Dashboard\Siswa;

use App\Exports\SiswaExport;
use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Data\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return view('dashboard.pages.data.siswa.siswa', compact('siswa'));
    }
    public function store(Request $request)
    {
        $siswa = Siswa::create([
            'nisn' => $request->nisn,
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
        return redirect('/dashboard/siswa');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $siswa = Siswa::findOrFail($id);

        // Lakukan proses update
        $siswa->nisn = $request->nisn;
        $siswa->nik = $request->nik;
        $siswa->nama_siswa = $request->nama_lengkap;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->agama = $request->agama;
        $siswa->email = $request->email;
        $siswa->hp = $request->hp;
        $siswa->alamat = $request->alamat;
        $siswa->provinsi = $request->provinsi;
        $siswa->kota_kabupaten = $request->kota_kabupaten;
        $siswa->kecamatan = $request->kecamatan;
        $siswa->kelurahan = $request->kelurahan;

        $siswa->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/siswa');
    }

    public function destroy($id)
    {
        $pendaftaran = Siswa::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/siswa');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }
    public function importExcel(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('upload'));

        toast('Berhasil Import Data!!!', 'success');
        return redirect('/dashboard/siswa');
    }
}
