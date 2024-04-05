<?php

namespace App\Http\Controllers\Dashboard\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'siswa')->get();
        $pendaftaran = Form::latest()->get();
        return view('dashboard.pages.pendaftaran.pendaftaran', compact('pendaftaran', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',
        ]);
        $file_name = null;
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->foto->storeAs('public/foto', $namaGambar);
        }

        $form = Form::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'hp' => $request->hp,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,

            // Alamat lengkap
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,

            'foto' => $file_name ? 'pas_foto/' . $namaGambar : null,

        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $pendaftaran = Form::findOrFail($id);

        // Lakukan proses update
        $pendaftaran->user_id = $request->user_id;
        $pendaftaran->nama_lengkap = $request->nama_lengkap;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->agama = $request->agama;
        $pendaftaran->email = $request->email;
        $pendaftaran->hp = $request->hp;
        $pendaftaran->instagram = $request->instagram;

        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->provinsi = $request->provinsi;
        $pendaftaran->kota_kabupaten = $request->kota_kabupaten;
        $pendaftaran->kecamatan = $request->kecamatan;
        $pendaftaran->kelurahan = $request->kelurahan;

        $pendaftaran->kelas = $request->kelas;
        $pendaftaran->jurusan = $request->jurusan;
        $pendaftaran->asal_sekolah = $request->asal_sekolah;
        $pendaftaran->alamat_asal_sekolah = $request->alamat_asal_sekolah;



        // Update berkas pas_foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $pendaftaran->foto = 'foto/' . $namaGambar;
            $request->foto->storeAs('public/foto', $namaGambar);
        }

        // Lanjutkan untuk berkas lainnya seperti ijaza, kartu_keluarga, akta_lahir

        $pendaftaran->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
    }

    public function destroy($id)
    {
        $pendaftaran = Form::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
    }
}
