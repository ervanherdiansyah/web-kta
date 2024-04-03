<?php

namespace App\Http\Controllers;

use App\Models\JadwalPendaftaran;
use App\Models\Pendaftaran\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    //
    public function Pendaftaran()
    {
        $jadwal = JadwalPendaftaran::where('id', 1)->first();
        return view('landing.pages.pendaftaran.Pendaftaran', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            // 'pas_foto' => 'nullable',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'nohp_ayah' => 'required|string|max:255',
            'nohp_ibu' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'nama_sekolah' => 'required|string|max:255',
            'jenis_pendaftaran' => 'required|string|max:255',
            'pilih_jurusan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            // 'ijaza' => 'nullable|string|max:255',
            // 'kartu_keluarga' => 'nullable|string|max:255',
            // 'akta_lahir' => 'nullable|string|max:255',

            'kode_pos_ibu' => 'required|string|max:255',
            'alamat_pekerjaan_ibu' => 'required|string',
            'gol_darah_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'no_ktp_ibu' => 'required|string|max:255',
            'kode_pos_ayah' => 'required|string|max:255',
            'alamat_pekerjaan_ayah' => 'required|string|max:255',
            'gol_darah_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'no_ktp_ayah' => 'required|string|max:255',

            'pilih_jurusan1' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:255',
            'transportasi' => 'required|string|max:255',
            't_badan' => 'required|string|max:255',
            'b_badan' => 'required|string|max:255',
            'ukuran_baju' => 'required|string|max:255',
            'kip' => 'required|string|max:255',
            'bahasa' => 'required|string|max:255',
            'hobi' => 'required|string|max:255',
            'cita_cita' => 'required|string|max:255',
            'alamat_sekolah_asal' => 'required|string',
            'kota_sekolah_asal' => 'required|string|max:255',
            'tahun_lulus' => 'required',
            'tanggal_ijazah' => 'required|date',
            'nomor_peserta_un' => 'required|string|max:255',
            'nomor_skhun' => 'required|string|max:255',
            'nomor_ijazah' => 'required|string|max:255',


        ], [
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
        ]);
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
            'pilih_jurusan1' => $request->pilih_jurusan1,
            'transportasi' => $request->transportasi,
            'anak_ke' => $request->anak_ke,
            't_badan' => $request->t_badan,
            'b_badan' => $request->b_badan,
            'ukuran_baju' => $request->ukuran_baju,
            'kip' => $request->kip,
            'bahasa' => $request->bahasa,
            'hobi' => $request->hobi,
            'cita_cita' => $request->cita_cita,
            'alamat_sekolah_asal' => $request->alamat_sekolah_asal,
            'kota_sekolah_asal' => $request->kota_sekolah_asal,
            'tahun_lulus' => $request->tahun_lulus,
            'tanggal_ijazah' => $request->tanggal_ijazah,
            'nomor_peserta_un' => $request->nomor_peserta_un,
            'nomor_skhun' => $request->nomor_skhun,
            'nomor_ijazah' => $request->nomor_ijazah,

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

            'no_ktp_ayah' => $request->no_ktp_ayah,
            'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'gol_darah_ayah' => $request->gol_darah_ayah,
            'alamat_pekerjaan_ayah' => $request->alamat_pekerjaan_ayah,
            'kode_pos_ayah' => $request->kode_pos_ayah,
            'no_ktp_ibu' => $request->no_ktp_ibu,
            'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'gol_darah_ibu' => $request->gol_darah_ibu,
            'alamat_pekerjaan_ibu' => $request->alamat_pekerjaan_ibu,
            'kode_pos_ibu' => $request->kode_pos_ibu,
            //Riwayat pendidikan 
            'nama_sekolah' => $request->nama_sekolah,
            // 'prestasi'=> $request->agama,
            'jenis_pendaftaran' => $request->jenis_pendaftaran,
            'pilih_jurusan' => $request->pilih_jurusan,
            'kode_pos' => $request->kode_pos,

            //data berkas
            'ijaza' => $file_name2 ? 'ijaza/' . $namaGambar2 : null,
            'kartu_keluarga' => $file_name3 ? 'kartu_keluarga/' . $namaGambar3 : null,
            'akta_lahir' => $file_name4 ? 'akta_lahir/' . $namaGambar4 : null,

            'status_pendaftaran' => 'Belum Terverifikasi',
            'tgl_pendaftaran' => now(),
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/pendaftaran');
    }
}
