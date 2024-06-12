<?php

namespace App\Http\Controllers\pengurus\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $pendaftaran = Pendaftaran::where('user_id', $user)->first();
        return view('dashboard.pages.pengurus.pendaftaran.pendaftaran', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $file_name = null;
        if ($request->hasFile('pas_foto')) {
            $file_name = $request->pas_foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->pas_foto->storeAs('public/pas_foto', $namaGambar);
        }

        $file_name2 = null;
        if ($request->hasFile('ijaza')) {
            $file_name2 = $request->ijaza->getClientOriginalName();
            $namaGambar2 = str_replace(' ', '_', $file_name2);
            $image = $request->ijaza->storeAs('public/ijaza', $namaGambar2);
        }

        $file_name3 = null;
        if ($request->hasFile('kartu_keluarga')) {
            $file_name3 = $request->kartu_keluarga->getClientOriginalName();
            $namaGambar3 = str_replace(' ', '_', $file_name3);
            $image = $request->kartu_keluarga->storeAs('public/kartu_keluarga', $namaGambar3);
        }

        $file_name4 = null;
        if ($request->hasFile('akta_lahir')) {
            $file_name4 = $request->akta_lahir->getClientOriginalName();
            $namaGambar4 = str_replace(' ', '_', $file_name4);
            $image = $request->akta_lahir->storeAs('public/akta_lahir', $namaGambar4);
        }

        $pendaftaran = Pendaftaran::create([
            'user_id' => Auth::user()->id,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pas_foto' => $file_name ? 'pas_foto/' . $namaGambar : null,
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
            //data orang tua
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'nohp_ayah' => $request->nohp_ayah,
            'nohp_ibu' => $request->nohp_ibu,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            //Riwayat pendidikan 
            'nama_sekolah' => $request->nama_sekolah,
            // 'prestasi'=> $request->agama,
            'jenis_pendaftaran' => $request->jenis_pendaftaran,
            'pilih_jurusan' => $request->pilih_jurusan,

            //data berkas
            'ijaza' => $file_name2 ? 'ijaza/' . $namaGambar2 : null,
            'kartu_keluarga' => $file_name3 ? 'kartu_keluarga/' . $namaGambar3 : null,
            'akta_lahir' => $file_name4 ? 'akta_lahir/' . $namaGambar4 : null,
            'status_pendaftaran' => 'Belum Terverifikasi',
            'tgl_pendaftaran' => now(),
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/pengurus/pendaftaran');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }
}
